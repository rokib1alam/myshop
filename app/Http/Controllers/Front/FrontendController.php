<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\categorie;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $categories=categorie::with('subcategories.childCategories')->get();
        return view('frontend.pages.index', compact('categories'));
    }
}
