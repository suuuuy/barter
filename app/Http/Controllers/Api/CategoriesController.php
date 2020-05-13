<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Categories;

class CategoriesController extends Controller
{
    function getCategories(){
        return Categories::all();
    }
}
