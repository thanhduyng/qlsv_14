<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class qlsv_xinnghi extends Model
{
    protected $table = 'qlsv_xinnghis';
    protected $fillable = ['id', 'ngaynghi','noidung','lydo','id_sinhvienlophoc'];
    public $timestams = false;
}
