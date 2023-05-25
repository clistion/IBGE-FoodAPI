<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Nutrient extends Model
{
    use HasFactory;
    protected $table ="nutrients";//force use this table name. fix plural probles!
    protected $visible = ['name', 'symbol','id'];//define which attributes are returned


   /**
    * The roles that belong to the Nutrient
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
   public function foods(): BelongsToMany
   {
       return $this->belongsToMany(Food::class, 'food_nutrient', 'nutrient_id', 'food_id');
   }
}
