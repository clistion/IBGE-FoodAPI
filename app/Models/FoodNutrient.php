<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class FoodNutrient extends Model
{
    use HasFactory;
    protected $table ="food_nutrient";//force use this table name. fix plural probles!
    protected $visible = ['food_id','nutrient_id','nutrients'];

    public function nutrients():BelongsToMany
    {
        return $this->belongsToMany(Nutrient::class);
    }
    public function foods(): BelongsToMany
   {
       return $this->belongsToMany(Food::class);
   }

}
