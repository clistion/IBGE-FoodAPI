<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $table ="foods";
    /**
     * Get the measurement associated with the Food
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function measurement(): HasOne
    {
        return $this->hasOne(Measurement::class);
    }

   /**
    * Get all of the nutrients for the Food
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function nutrients(): HasMany
    {
        return $this->hasMany(Nutrient::class);
    }

    /**
     * Get the preparation associated with the Food
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function preparation(): HasOne
    {
        return $this->hasOne(Preparation::class);
    }
}
