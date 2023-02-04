<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='products';
    protected $primaryKey ='id';

    public $timestamps=true;

    //protected $dateFormat='h:m:s';
    //protected $fillable=['name','price','feature_image','feature_image_path','content','user_id','category_id'];
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    //One to Many
    public function productImages(){
        return $this->hasMany(ProductImages::class);
    }
    //Many to Many
    // public function tags()
    // {
    //     return $this->morphToMany(Tag::class, 'product_tags');
    // }
    public function tags(){
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id')->withTimestamps();
    }
}
