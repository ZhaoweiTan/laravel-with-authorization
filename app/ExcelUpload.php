<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExcelUpload extends Model
{
    protected $table = 'excel_uploads';

    protected $fillable = [
        'name', 'occupation', 'age',
    ];

}
