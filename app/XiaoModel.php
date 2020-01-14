<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class XiaoModel extends Model
{
     protected $table="xiaoqu";
    protected $primaryKey="x_id";
    public $timestamps = false;
}
