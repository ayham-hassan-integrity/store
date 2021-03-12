<?php

namespace App\Domains\Product\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Domains\Product\Models\Traits\Attribute\ProductAttribute;
use App\Domains\Product\Models\Traits\Method\ProductMethod;
use App\Domains\Product\Models\Traits\Relationship\ProductRelationship;
use App\Domains\Product\Models\Traits\Scope\ProductScope;


/**
 * Class Product.
 */
class Product extends Model
{
    use SoftDeletes,
        ProductAttribute,
        ProductMethod,
        ProductRelationship,
        ProductScope;

    /**
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'products';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [         "name",        "description",    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];


    public $timestamps =["create_at","update_at"];

    /**
     * @var array
     */
    protected $dates = [
    "create_at",
    "update_at",
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * @var array
     */
    protected $appends = [

    ];

}