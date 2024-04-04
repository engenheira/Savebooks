<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $fillable = ['full_name', 'date_of_birth', 'country', 'biography'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
