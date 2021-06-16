<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'photo',
        'description',
        'parent_id',
        'min_price',
    ];

    /**
     * Get the products for the category.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    // public function categories()
    // {
    //    return $this->hasMany(Category::class);
    // }

    public function childrenCategories()
    {
        // return $this->hasMany(Category::class, 'parent_id')->with('children');
       return $this->hasMany(Category::class)->with('categories');
    }
    // public function childs()
    // {
    //     return $this->hasMany(Category::class, 'parent_id', 'id');
    // }
    // public function childrenRecursive()
    // {
    //     return $this->childCategories()->with('childrenRecursive');
    // }
}
