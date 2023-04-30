<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $with = ['detail', 'status', 'user'];

    public function detail() {
        return $this->hasMany(DetailOrder::class);
    }

    public function status () {
        return $this->belongsTo(Status::class);
    }

    public function user () {
        return $this->belongsTo(User::class);
    }
}
