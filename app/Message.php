<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = "Messages";
    protected $fillable = ['sender','subject','message','time_sent','archived','read'];
    public $timestamps = false;
}
