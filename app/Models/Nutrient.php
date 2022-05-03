<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Nutrient extends Model
{
    use HasFactory;


   /**
    * The roles that belong to the Nutrient
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
   public function foods(): BelongsToMany
   {
       return $this->belongsToMany(Food::class);
   }
}
