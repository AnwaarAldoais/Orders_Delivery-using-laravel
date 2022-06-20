<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $guarded = [ ];
    //
    protected $table ='meals';

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
