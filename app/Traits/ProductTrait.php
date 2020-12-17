<?php

namespace App\Traits;

use Illuminate\Support\ServiceProvider;

Trait ProductTrait 
{

	public function saveImage($image){

		$ext = $image->getClientOriginalExtension();		
		$name = "product_".uniqid().".$ext";
		$image->move( public_path('images') , $name ); 
		return $name;
		
	}
}
