<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExcelUpload extends Model
{
    protected $table = 'dce';

    protected $fillable = [
        'ID','authors','title','conf','abbreviation','page','year','toopic','abstract','people'
    ];

}
