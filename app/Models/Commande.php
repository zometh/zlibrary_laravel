<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $total_amount
 * @property string $statut
 * @property string|null $date_paiement
 * @property string $moyen_paiement
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Commande newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Commande newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Commande query()
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereDatePaiement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereMoyenPaiement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereStatut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereTotalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereUserId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CommandeLivre> $commande_livre
 * @property-read int|null $commande_livre_count
 * @property-read \App\Models\User $user
 * @mixin \Eloquent
 */
class Commande extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'total_amount',
        'statut',
        'date_paiement',
        'moyen_paiement',
    ];

    protected $casts = [
        'date_paiement' => 'datetime',
    ];
    public function commande_livre()
    {
        return $this->hasMany(CommandeLivre::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
