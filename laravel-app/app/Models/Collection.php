<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'season',
        'designer_id'
    ];
    public function product()
    {
        return $this->hasMany(Product::class);
    }
    public function designer()
    {
        return $this->belongsTo(Designer::class);
    }
}
