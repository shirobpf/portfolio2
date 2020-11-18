<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOperate extends Model
{
    protected $guarded = ['id', 'year'];
    use HasFactory;
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';
}
