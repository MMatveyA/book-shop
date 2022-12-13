<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    /*
     * Атрибуты для массовго объявления
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'second_name',
        'thrid_name',
        'birth',
        'death',
        'biography',
        'image',
        'thumb',
    ];

    public function books () 
    {
        return $this->hasMany(Book::class);
    }
}
