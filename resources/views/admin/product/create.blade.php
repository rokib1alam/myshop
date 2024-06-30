@extends('layouts.admin')
@section('title','Product')
@section('admin_content')
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center justify-content-between">
                    <div class="col-sm-auto">
                        <div class="page-header-title">
                            <h5 class="mb-0">New Product</h5>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{ route('admin.home') }}"><i
                                        class="ph-duotone ph-house"></i></a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Home</a></li>
                            <li class="breadcrumb-item" aria-current="page">Add Product</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- [ breadcrumb ] end -->
        <!-- [ form-element ] start -->
        <form role="form" action="{{ route('page.store') }}" method="post">
            @csrf
            <!-- [ Main Content ] start -->
            <div class="row">
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h5 class="text-light">All New Product</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Product Name <sup class="text-size-20 top-1">*</sup></label>
                                        <div class="input-group">
                                            <input id="page_name" type="text" name="page_name" class="form-control" placeholder="Page Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Product Code <sup class="text-size-20 top-1">*</sup></label>
                                        <div class="input-group">
                                            <input id="page_name" type="text" name="page_name" class="form-control" placeholder="Page Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Category/Subcategory <sup class="text-size-20 top-1">*</sup></label>
                                        <div class="input-group">
                                            <select name="page_position" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Child Category <sup class="text-size-20 top-1">*</sup></label>
                                        <div class="input-group">
                                            <select name="page_position" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Brand <sup class="text-size-20 top-1">*</sup></label>
                                        <div class="input-group">
                                            <select name="page_position" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Pickup Point</label>
                                        <div class="input-group">
                                            <select name="page_position" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Unit <sup class="text-size-20 top-1">*</sup></label>
                                        <div class="input-group">
                                            <select name="page_position" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Tags</label>
                                        <div class="input-group">
                                            <input id="page_title" type="text" name="page_title" class="form-control" placeholder="Page Title">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Purchase Price</label>
                                        <div class="input-group">
                                            <input id="page_title" type="text" name="page_title" class="form-control" placeholder="Page Title">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Selling Price <sup class="text-size-20 top-1">*</sup></label>
                                        <div class="input-group">
                                            <input id="page_title" type="text" name="page_title" class="form-control" placeholder="Page Title">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Discount Price</label>
                                        <div class="input-group">
                                            <input id="page_title" type="text" name="page_title" class="form-control" placeholder="Page Title">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Warehouse <sup class="text-size-20 top-1">*</sup></label>
                                        <div class="input-group">
                                            <select name="page_position" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Stock</label>
                                        <div class="input-group">
                                            <input id="page_title" type="text" name="page_title" class="form-control" placeholder="Page Title">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">color</label>
                                        <div class="input-group">
                                            <input id="page_title" type="text" name="page_title" class="form-control" placeholder="Page Title">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">

                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Size</label>
                                        <div class="input-group">
                                            <input id="page_title" type="text" name="page_title" class="form-control" placeholder="Page Title">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Page Details</label>
                                        <textarea class="form-control textarea" name="page_description" id="summernote" rows="4" ></textarea> 
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Video Embed Code</label>
                                        <textarea class="form-control textarea" name="page_description"  rows="2" ></textarea>
                                    </div>
                                </div>
                                {{-- <div class="col-md-12 text-end">
                                    <button class="btn btn-primary">Create Page</button>
                                </div> --}}
                            </div>
                        </div>
                    </div><!-- HTML Input Types -->
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="brand_logo" class="col-form-label pt-0">Main Thumbnail  <sup class="text-size-20 text-denger">*</sup></label>
                                <input type="file" class="dropify" data-height="200" name="brand_logo" />
                            </div>
                            <div class="form-group">
                                <table class="table table-bordered" id="dynamicTable">
                                    <small class="card-title">More Images (Click Add For More Image)</small>
                                    <tr>
                                      <td><input type="file" accept="image/*" name="images[]" class="form-control name_list"></td>
                                      <td><button type="button" name="add" id="add" class="btn btn-primary">Add</button></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="card p-4">
                                <h6>Featured Product</h6>
                                <input type="checkbox" id="switch_event" data-toggle="switchbutton" checked data-onstyle="primary"> 
                            </div>
                            <div class="card p-4">
                                <h6>Today Deal</h6>
                                <input type="checkbox" id="switch_event" data-toggle="switchbutton" checked data-onstyle="primary"> 
                            </div>
                            <div class="card p-4">
                                <h6>Status</h6>
                                <input type="checkbox" id="switch_event" data-toggle="switchbutton" checked data-onstyle="primary"> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </form><!-- [ form-element ] end -->    

    </div>
</div>
@endsection
