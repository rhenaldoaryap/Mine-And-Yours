<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'about',
        'main_material',
        'cost',
        'sterile',
        'date_of_production',
        'duration',
        'type',
        'price',
    ];

    protected $hidden = [

    ];

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'products_id', 'id');
    }
}
