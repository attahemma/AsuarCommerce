<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function items(){

        return $this->belongsToMany(Book::class, 'order_items', 'order_id', 'book_id')->withPivot('quantity', 'price');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
