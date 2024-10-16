<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','slug','photo','image','language_id', 'subcategory_id', 'childcategory_id'];
    public $timestamps = false;

    public function subs()
    {
    	return $this->hasMany('App\Models\Subcategory')->where('status','=',1);
    }

    public function childcategory()
    {
        return $this->hasMany('App\Models\Childcategory')->where('status','=',1);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function language()
    {
    	return $this->belongsTo('App\Models\Language','language_id')->withDefault();
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_replace(' ', '-', $value);
    }

    public function attributes() {
        return $this->morphMany('App\Models\Attribute', 'attributable');
    }
}
