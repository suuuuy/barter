<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
	protected $table = 'categories';
    public $primaryKey = 'id';
    public $timestamps = true;
}
