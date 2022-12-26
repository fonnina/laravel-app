<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'material',
        'description',
        'collection_id'
    ];



    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }
}
