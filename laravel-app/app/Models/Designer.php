<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'career_age'
    ];

    public function collection()
    {
        return $this->hasMany(Collection::class);
    }
}
