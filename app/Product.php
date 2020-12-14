<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public $table= "products";
    protected $fillable = ['name','description','price','status','quantity'];
    
}
