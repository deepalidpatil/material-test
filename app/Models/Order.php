<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    // to get category information by id
    public function get_category(){
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    // to get material information by id
    public function get_material(){
        return $this->belongsTo('App\Models\Material', 'material_id', 'id');
    }
}
