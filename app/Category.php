<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model
{

    public $table= "categories";

    protected $fillable= ['name'];

    public function products(){
        return $this->hasMany('App\Product' ,'category_id');	
    }
    public function subcategory(){
        return $this->hasMany('App\SubCategory' ,'category_id');	
    }
}
