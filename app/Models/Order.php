<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id', 'item_id', 'price'
    ];

    public function accounts(){
        return $this->belongsTo(User::class, 'account_id');
    }

    public function items(){
        return $this->hasMany(Item::class, 'item_id');
    }
}
