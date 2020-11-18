<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'connection-name';
    protected $table = 'User';

}