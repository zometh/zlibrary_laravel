<?php

namespace App\Services;

use App\Models\Commande;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class BillingService
{
    /**
     * Génère une facture PDF pour une commande
     *
     * @param Commande $commande
     * @return string Chemin du fichier PDF généré
     */
    public function generateInvoice(Commande $commande): string
    {
        // Chargement des relations nécessaires pour la facture
        $commande->load(['user', 'commande_livre.book']);


        $billingNumber = 'INV-' . date('Y') . '-' . str_pad($commande->id, 5, '0', STR_PAD_LEFT);

        // Génération du PDF
        $pdf = PDF::loadView('pdf.billing', [
            'commande' => $commande,
            'invoiceNumber' => $billingNumber,
            'date' => now()->format('d/m/Y'),
        ]);

        // Définition du nom du fichier
        $filename = 'facture_' . $billingNumber . '.pdf';

        // Sauvegarde du PDF dans le stockage
        $path = 'factures/' . $filename;
        Storage::put('public/' . $path, $pdf->output());

        return $path;
    }

    /**
     * Envoie la facture par email au client
     *
     * @param Commande $commande
     * @param string $pdfPath
     * @return void
     */
    public function sendInvoiceByEmail(Commande $commande, string $pdfPath)
    {
        // Logique d'envoi d'email avec la facture en pièce jointe
        // Cette méthode pourrait utiliser Mail::send() ou Notification::send()
    }
}
