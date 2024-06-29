<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\coupon;
use App\Models\warehouse;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CouponController extends Controller
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
            $coupons = coupon::all();;
            return DataTables::of($coupons)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $actionbtn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm me-1 edit" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#edit-Modal">
                                <i class="fa fa-edit"></i>
                                </a>
                                <button class="btn btn-danger btn-sm delete" data-id="' . $row->id . '">
                                <i class="fa fa-trash"></i>
                                </button>
                                <form id="delete-form-' . $row->id . '" action="' . route('coupon.destroy', $row->id) . '" method="POST" style="display: none;">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                </form>';
                return $actionbtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('admin.offer.coupon.index');
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
        coupon::newCoupons($request);
        $this->toastr->success('Coupon Inserted successfully!');
        // return back();
        return response()->json(['success' => true, 'message' => 'Coupon inserted successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(coupon $coupon)
    {
        return view('admin.offer.coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, coupon $coupon)
    {
        coupon::updateCoupons($request, $coupon);
        return response()->json(['success' => true,'message' => 'Coupon updated successfully!']);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(coupon $coupon)
    {
        coupon::deleteCoupons($coupon);
        $this->toastr->success('coupon deleted successfully!');
        return response()->json(['success' => true, 'message' => 'Coupon deleted successfully!']);
    
    }
}
