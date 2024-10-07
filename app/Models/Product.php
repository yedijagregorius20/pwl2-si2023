<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'product_category_id',
        'id_supplier',
        'description',
        'price',
        'stock',
];
public function get_product() {
    // Get all products with the related category (assuming the relation is set up)
    return Product::select("products.*", "category_product.product_category_name as product_category_name")
        ->join('category_product', 'category_product.id', '=', 'products.product_category_id')
    ->get();
}
  
    public function get_category_product() {
        return DB::table('category_product')
            ->select('id', 'product_category_name');
}
}
