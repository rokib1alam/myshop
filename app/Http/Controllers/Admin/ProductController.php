<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\brand;
use App\Models\categorie;
use App\Models\pickup;
use App\Models\product;
use App\Models\subcategorie;
use App\Models\warehouse;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

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
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query= product::query();
            // check for surching 
                if ($request->category_id) {
                    $query->where('category_id', $request->category_id);
                }
                if ($request->brand_id) {
                    $query->where('brand_id', $request->brand_id);
                }
                if ($request->status !== null) { // status can be 0 or 1, so explicitly check for null
                    $query->where('status', $request->status);
                }
                if ($request->warehouse) {
                    $query->where('warehouse', $request->warehouse);
                }
            $products = $query->get();
            return DataTables::of($products)
            ->addIndexColumn()
            ->addColumn('thumbnail', function ($row) {
                if ($row->thumbnail) {
                    return '<img src="' . asset($row->thumbnail) . '" alt="Thumbnail" class="img-fluid center-image" style="max-width: 40px; display: block; margin: 0 auto;">';
                } else {
                    return 'No logo uploaded';
                }
            })
            ->editColumn('category_name',function($row){
                return $row->category->category_name;
            })
            ->editColumn('subcategory_name',function($row){
                return $row->subcategory->subcategory_name;
            })
            ->editColumn('brand_name',function($row){
                return $row->brand->brand_name;
            })
            ->editColumn('featured', function($row) {
                if ($row->featured == 1) {
                    return '<a href="javascript:void(0)" data-id="'.$row->id.'" class="deactive_featurd"><i class="fas fa-thumbs-down text-danger"></i> <span class="badge badge-success">active</span></a>';
                } else {
                    return '<a href="" data-id="'.$row->id.'" class="active_featurd"><i class="fas fa-thumbs-up text-success"></i> <span class="badge badge-danger">inactive</span></a>';
                }
            })
            ->editColumn('today_deal',function($row){
                if ($row->today_deal == 1) {
                    return '<a href="javascript:void(0)" data-id="'.$row->id.'" class="deactive_deal"><i class="fas fa-thumbs-down text-danger"></i> <span class="badge badge-success">active</span></a>';
                } else {
                    return '<a href="" data-id="'.$row->id.'" class="active_deal"><i class="fas fa-thumbs-up text-success"></i> <span class="badge badge-danger">inactive</span></a>';
                }
            })
            ->editColumn('status',function($row){
                if ($row->status == 1) {
                    return '<a href="javascript:void(0)" data-id="'.$row->id.'" class="deactive_status"><i class="fas fa-thumbs-down text-danger"></i> <span class="badge badge-success">active</span></a>';
                } else {
                    return '<a href="" data-id="'.$row->id.'" class="active_status"><i class="fas fa-thumbs-up text-success"></i> <span class="badge badge-danger">inactive</span></a>';
                }
            })
            ->addColumn('action', function ($row) {
                $actionbtn = '<a href="javascript:void(0)" class="btn btn-info btn-sm me-1 edit">
                                <i class="fa fa-edit"></i>
                              </a>
                              <a href="#" class="btn btn-primary btn-sm me-1 show">
                                <i class="fa fa-eye"></i>
                              </a>
                                <button class="btn btn-danger btn-sm delete" data-id="' . $row->id . '"> 
                                    <i class="fa fa-trash"></i>
                                </button>
                            <form id="delete-form-' . $row->id . '" action="' . route('product.destroy', $row->id) . '" method="POST" style="display: none;">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                            </form>';
                return $actionbtn;
            })
            ->rawColumns(['thumbnail','action','category_name','subcategory_name','brand_name','featured','today_deal', 'status'])
            ->make(true);
        }
        $categories=categorie::all();
        $brands=brand::all();
        $warehouses=warehouse::all();
        return view('admin.product.index', compact('categories','brands','warehouses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = categorie::all();
        $subcategories = subcategorie::all();
        $brands = brand::all();
        $pickuppoints = pickup::all();
        $warehouses = warehouse::all();
        return view('admin.product.create', compact('categories', 'brands', 'pickuppoints', 'subcategories', 'warehouses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'product_name' => 'required',
            'product_code' => 'required|string|max:255',  
            'subcategory_id' => 'required',
            'brand_id' => 'required',
            'unit' => 'required',
            'selling_price' => 'required',
            'color' => 'required',
            'description' => 'required',
        ]);

        product::newProduct($request);
        $this->toastr->success('Product Inserted successfully!');
        return back();
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
        product::deleteProduct($product);
        return response()->json(['success' => true, 'message' => 'Product deleted successfully!']);
    }
    /**
     * Not Featured
     */
    public function notfeatured($id)
    {
        product::where('id', $id)->update(['featured' => 0]);
        return response()->json(['message' => 'Product is no longer featured.']);
    }
    /**
     * Active Featured
     */
    public function activefeatured($id)
    {
        product::where('id', $id)->update(['featured' => 1]);
        return response()->json(['message' => 'Product Featured Activate.']);
    }
    /**
     * Not Featured
     */
    public function notdeal($id)
    {
        product::where('id', $id)->update(['today_deal' => 0]);
        return response()->json(['message' => 'Product is Not Deal Today.']);
    }
    /**
     * Active Featured
     */
    public function activedeal($id)
    {
        product::where('id', $id)->update(['today_deal' => 1]);
        return response()->json(['message' => 'Product Deal Activate.']);
    }
    /**
     * Not Featured
     */
    public function notstatus($id)
    {
        product::where('id', $id)->update(['status' => 0]);
        return response()->json(['message' => 'Product Status is not Active.']);
    }
    /**
     * Active Featured
     */
    public function activestatus($id)
    {
        product::where('id', $id)->update(['status' => 1]);
        return response()->json(['message' => 'Product Status Activate.']);
    }

}
