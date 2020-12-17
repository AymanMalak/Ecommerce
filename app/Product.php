<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
class Product extends Model
{

    public $table= "products";
    protected $fillable = ['name','description','price','status','quantity','category_id','img'];
    public function category(){
        return $this->belongsTo('App\Category');	
    }
}
