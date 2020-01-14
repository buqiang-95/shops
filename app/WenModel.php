<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WenModel extends Model
{
    protected $table="wenzhang";
    protected $primaryKey="w_id";
    public $timestamps = false;
}
