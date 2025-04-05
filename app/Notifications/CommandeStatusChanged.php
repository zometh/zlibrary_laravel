<?php

namespace App\Notifications;

use App\Models\Commande;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Storage;

class CommandeStatusChanged extends Notification implements ShouldQueue
{
    use Queueable;

    protected Commande $commande;
    protected ?string $pdfPath;

    /**
     * Create a new notification instance.
     */
    public function __construct(Commande $commande, ?string $pdfPath = null)
    {
        $this->commande = $commande;
        $this->pdfPath = $pdfPath;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $mailMessage = (new MailMessage)
            ->subject('Mise à jour de votre commande #' . $this->commande->id)
            ->greeting('Bonjour ' . $notifiable->name . ',')
            ->line('Le statut de votre commande a été mis à jour.')
            ->line('Nouveau statut : ' . ucfirst($this->commande->statut));

        // Si le statut est 'expédiée' et qu'une facture a été générée, l'attacher à l'email
        if ($this->commande->statut === 'expédiée' && $this->pdfPath) {
            $mailMessage->line('Votre commande a été expédiée. Vous trouverez ci-joint votre facture.')
                ->attach(storage_path('app/public/' . $this->pdfPath), [
                    'as' => 'facture_commande_' . $this->commande->id . '.pdf',
                    'mime' => 'application/pdf',
                ]);
        }

        return $mailMessage
            ->action('Voir les détails de ma commande', url('/zlibrary/command-details/' . $this->commande->id))
            ->line('Merci d\'avoir choisi notre librairie en ligne!');
    }
}
