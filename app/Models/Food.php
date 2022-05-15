<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Food extends Model
{
    use HasFactory;
    protected $table ="foods";
    protected $visible = ['id','code', 'description','preparation_code','preparation_name', 'nutrients'];//define quais attr serão retornadados
    // protected $visible = ['code', 'description','preparation_code'];
    protected $appends = ['name'];
    // protected $appends = ['name','preparation_name'];

    /**
     * Get all of the nutrients for the Food
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
     public function nutrients():BelongsToMany
     {
         return $this->belongsToMany(Nutrient::class,'food_nutrient','food_id','nutrient_id');
     }

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
     * Get the preparation associated with the Food
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function preparation(): HasOne
    {
        return $this->hasOne(Preparation::class);
    }

    /**
     * Get the user associated with the Food
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category(): HasOne
    {
        return $this->hasOne(Category::class);
    }



     /**
     * adiciona um novo atributo ao modelo Food.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    // protected function preparationName(): Attribute
    // {
    //     return new Attribute(
    //         get: fn () => null,
    //     );
    // }
}
