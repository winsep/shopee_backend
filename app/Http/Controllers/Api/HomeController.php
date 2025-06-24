<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'Home Page']);
    }

    public function banners()
    {
        //
    }

    public function categories()
    {
        
    }

    public function flashSale()
    {
        //
    }

    public function topSelling()
    {
        //
    }

    public function trending()
    {
        //
    }

    public function recommendByCategory()
    {
        //
    }

    public function getRecommendByCategory()
    {
        //
    }
}
