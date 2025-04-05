<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $commande_id
 * @property int $book_id
 * @property int $quantity
 * @property string $unit_price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CommandeLivre newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommandeLivre newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommandeLivre query()
 * @method static \Illuminate\Database\Eloquent\Builder|CommandeLivre whereBookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommandeLivre whereCommandeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommandeLivre whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommandeLivre whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommandeLivre whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommandeLivre whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommandeLivre whereUpdatedAt($value)
 * @property-read \App\Models\Book $book
 * @mixin \Eloquent
 */
class CommandeLivre extends Model
{
    use HasFactory;
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
