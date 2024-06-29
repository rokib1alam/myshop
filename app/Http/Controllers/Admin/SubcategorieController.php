<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\categorie;
use App\Models\subcategorie;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;

class SubcategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $toastr;
    public function __construct(ToastrInterface $toastr)
    {
        $this->middleware('auth');
        $this->toastr = $toastr;
    }
    public function index()
    {
        $subcategories= subcategorie::all();
        $categories= categorie::all();
        return view('admin.category.subcategory.index', compact('subcategories','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'required|max:255',
        ]);
        subcategorie::newSubCategories($request);
        $this->toastr->success('Subcategory Inserted successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(subcategorie $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(subcategorie $subcategory)
    {
        $categories= categorie::all();
        return view('admin.category.subcategory.edit', compact('subcategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, subcategorie $subcategory)
    {
        $request->validate([
            'subcategory_name' => 'required|max:255',
        ]);
        subcategorie::updateSubCategories($request, $subcategory);
        $this->toastr->success('Subcategory updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(subcategorie $subcategory)
    {
        subcategorie::deleteSubCategories($subcategory);
        $this->toastr->success('Subcategory deleted successfully!');
        return back();
    }
}
