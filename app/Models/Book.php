<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property string $title
 * @property string $author
 * @property int $price
 * @property int $stock
 * @property string $image
 * @property string $description
 * @property int $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
 * @method static \Illuminate\Database\Eloquent\Builder|Book newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Book newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Book query()
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereUpdatedAt($value)
 * @property string $status
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereStatus($value)
 * @mixin \Eloquent
 */
class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'author',
        'price',
        'stock',
        'image',
        'description',
        'category_id'

    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
