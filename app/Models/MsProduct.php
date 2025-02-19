<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsProduct extends Model
{
    use HasFactory;

    protected $table = 'ms_products';

    protected $primaryKey = 'product_id';

    protected $guarded = ['product_id'];

    public function mscategory(){
        return $this->belongsTo(MsCategory::class, 'category_id', 'category_id');
    }

    public function msbrand(){
        return $this->belongsTo(MsBrand::class, 'brand_id', 'brand_id');
    }

    public function transactiondetail(){
        return $this->hasMany(TransactionDetail::class, 'product_id', 'product_id');
    }

    public function mscart(){
        return $this->hasMany(MsCart::class, 'product_id', 'product_id');
    }
}
