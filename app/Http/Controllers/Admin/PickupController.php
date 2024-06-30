<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\pickup;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PickupController extends Controller
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
            $pickups = pickup::all();;
            return DataTables::of($pickups)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionbtn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm me-1 edit" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#edit-Modal">
                                    <i class="fa fa-edit"></i>
                                    </a>
                                    <button class="btn btn-danger btn-sm delete" data-id="' . $row->id . '">
                                    <i class="fa fa-trash"></i>
                                    </button>
                                    <form id="delete-form-' . $row->id . '" action="' . route('pickuppoint.destroy', $row->id) . '" method="POST" style="display: none;">
                                        ' . csrf_field() . '
                                        ' . method_field('DELETE') . '
                                    </form>';
                    return $actionbtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.pickup_point.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        pickup::newPickups($request);
        // $this->toastr->success('Pickup Point Inserted successfully!');
        return response()->json(['success' => true, 'message' => 'Pickup Point inserted successfully!']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pickup $pickuppoint)
    {
        return view('admin.pickup_point.edit', compact('pickuppoint'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pickup $pickuppoint)
    {
        pickup::updatePickups($request, $pickuppoint);
        return response()->json(['success' => true, 'message' => 'Pickup Point updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pickup $pickuppoint)
    {
        pickup::deletePickups($pickuppoint);
        // $this->toastr->success('Pickup Point deleted successfully!');
        return response()->json(['success' => true, 'message' => 'Pickup Point deleted successfully!']);
    }
}
