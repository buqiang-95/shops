<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KsaModel extends Model
{
    protected $table="fen";
    protected $primaryKey="f_id";
    public $timestamps = false;
}
