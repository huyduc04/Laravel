<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'id','description','images','price'];
    protected $table='products';
    public $primaryKey  = 'id';
    public function Product()
    {
        return $this->belongsTo(Product ::class);
    }
    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

