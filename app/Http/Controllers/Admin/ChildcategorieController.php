<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\categorie;
use App\Models\childcategorie;
use App\Models\subcategorie;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class ChildcategorieController extends Controller
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
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $childcategories= childcategorie::all();
            return DataTables::of($childcategories)
            ->addIndexColumn()
            ->addColumn('subcategory_name', function ($row) {
                return $row->subcategory->subcategory_name;
            })
            ->addColumn('category_name', function ($row) {
                return $row->subcategory->category->category_name;
            })
            ->addColumn('action', function ($row) {
                $actionbtn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm me-1 edit" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#editModal">
                                <i class="fa fa-edit"></i>
                              </a>
                                <button class="btn btn-danger btn-sm delete" data-id="' . $row->id . '">
                                    <i class="fa fa-trash"></i>
                                </button>
                            <form id="delete-form-' . $row->id . '" action="' . route('childcategory.destroy', $row->id) . '" method="POST" style="display: none;">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                            </form>';
                return $actionbtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        $subcategories = subcategorie::all();
        $categories = categorie::all();
        return view('admin.category.childcategory.index', compact('subcategories', 'categories'));
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
            'childcategory_name' => 'required|max:255',
        ]);
        childcategorie::newChildCategories($request);
        $this->toastr->success('Childcategory Inserted successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(childcategorie $childcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(childcategorie $childcategory)
    {
        $categories= categorie::all();
        $subcategories= subcategorie::all();
        return view('admin.category.childcategory.edit', compact('childcategory','subcategories','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, childcategorie $childcategory)
    {
        $request->validate([
            'childcategory_name' => 'required|max:255',
        ]);

        childcategorie::updateChildCategories($request, $childcategory);
        $this->toastr->success('Childcategory updated successfully!');
        return back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(childcategorie $childcategory)
    {
        childcategorie::deleteChildCategories($childcategory);
        $this->toastr->success('Childcategory deleted successfully!');
        return back();
    }
}
