<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    //
    public $table ="subcategories";
    protected $fillable = ['name','category_id'];
    public function category(){
        return $this->belongsTo('App\Category');	
    }
}
