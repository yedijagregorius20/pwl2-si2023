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
    public function get_product(){
        //get all products
        // $sql = $this->select("products.*", "category_product.product_category_name as product_category_name")
        //             ->join('category_product', 'category_product.id', '=', 'products.product_category_id'); // Join
        $sql= DB::table('products')
                      ->select('*')  // Selecting all columns from the products table
                      ->get();  // Execute the query and return the result
        
    return $sql;
    }
    public function get_category_product() {
        return DB::table('category_product')
            ->select('id', 'product_category_name');
}
}
