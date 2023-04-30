<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $with = ['product'];

    public function order () {
       return $this->belongsTo(DetailOrder::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function product () {
        return $this->belongsTo(Product::class);
    }
}
