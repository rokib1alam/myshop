<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\page;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;

class PageController extends Controller
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
        $pages=page::all();
        return view('admin.setting.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.setting.page.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        page::newPages($request);
        $this->toastr->success('Page Crate successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(page $page)
    {
        return view('admin.setting.page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, page $page)
    {
        page::updatePages($request, $page);
        $this->toastr->success('Page updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(page $page)
    {
        page::deletePages($page);
        $this->toastr->success('Page deleted successfully!');
        return back();
    }
}
