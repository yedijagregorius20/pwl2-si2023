<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function get_product(){
        //get all products
        // $sql = $this->select("products.*", "category_product.product_category_name as product_category_name")
        //             ->join('category_product', 'category_product.id', '=', 'products.product_category_id'); // Join
        $sql= DB::table('products')
                      ->select('*')  // Selecting all columns from the products table
                      ->get();  // Execute the query and return the result
        
    return $sql;
    }
}
