<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductList extends Model
{
    //
    protected $table = 'product_list';
    public $timestamps = false;
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Many-to-One: product make by single user
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
