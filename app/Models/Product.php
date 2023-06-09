<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['nama_product','harga','gambar','deskripsi','category_id','rating'];
    protected $table = 'products';
    protected $primaryKey = 'id';

    public function categories(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
