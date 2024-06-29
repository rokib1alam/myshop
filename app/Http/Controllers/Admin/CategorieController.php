<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\categorie;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;

class CategorieController extends Controller
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
        $categories= categorie::all();
        return view('admin.category.category.index', compact('categories'));
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
            'category_name' => 'required|string|max:255',
        ]);
        categorie::newcategories($request);
        $this->toastr->success('Category Inserted successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(categorie $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(categorie $category)
    {
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, categorie $category)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);
        categorie::updateCategories($request, $category);
        $this->toastr->success('Category updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(categorie $category)
    {
        categorie::deleteCategory($category);
        $this->toastr->success('Category deleted successfully!');
        return back();
    }
}
