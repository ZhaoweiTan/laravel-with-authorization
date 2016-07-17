<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExcelUpload extends Model
{
    protected $table = 'test_papers';

    protected $fillable = [
        'authors','title','conf','abbreviation','page','year','topic','abstract','people'
    ];

}
