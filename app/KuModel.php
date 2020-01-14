<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KuModel extends Model
{
    protected $table="ku_user";
    protected $primaryKey="uid";
    public $timestamps = false;
}
