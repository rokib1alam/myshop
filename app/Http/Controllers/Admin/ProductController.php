<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\categorie;
use App\Models\pickup;
use App\Models\product;
use App\Models\subcategorie;
use App\Models\warehouse;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $toastr;
    public function __construct(ToastrInterface $toastr)
    {
        $this->middleware('auth');
        $this->toastr = $toastr;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=categorie::all();
        $subcategories = subcategorie::all();
        $brands=Brand::all();
        $pickpuppoints=pickup::all();
        $warehouses=warehouse::all();
        return view('admin.product.create', compact('categories','brands','pickpuppoints','subcategories', 'warehouses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        //
    }
}
