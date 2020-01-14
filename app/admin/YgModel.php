<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class YgModel extends Model
{
    protected $table="yuangong";
    protected $primaryKey="b_id";
    public $timestamps = false;
}
