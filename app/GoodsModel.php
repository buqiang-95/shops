<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodsModel extends Model
{
    protected $table="new_fen";
    protected $primaryKey="f_id";
    public $timestamps = false;
}
