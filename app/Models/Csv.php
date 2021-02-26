<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Csv extends Model
{    
    /*インポート時に必須なパラメータ*/
        protected $fillable = [
        'email',
        'name_family',
        'name_first',
        'password',];     

}
