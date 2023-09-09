<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $guarded = ['id'];
    //     protected $fillable = [
    //     'name',
    //     'slug',
    //     'description',
    // ];
    public function products()
    {
        return $this->HasMany(Product::class, 'category_id', 'id');
    }
    public function brands()
    {
        return $this->HasMany(Brand::class, 'category_id', 'id');
    }
}
