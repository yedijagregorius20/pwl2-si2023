<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['nama_supplier', 'alamat_supplier', 'pic_supplier', 'no_hp_supplier'];
    public function get_supplier() {
        return DB::table('suppliers')
            ->select('id', 'nama_supplier');
}
}
