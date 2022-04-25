<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dish extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function category()
    {
      return  $this->belongsTo('App\Models\Category','category_id');
    }
}
