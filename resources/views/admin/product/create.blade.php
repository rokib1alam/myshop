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
                                            <input id="name" type="text" name="name" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Product Code <sup class="text-size-20 top-1">*</sup></label>
                                        <div class="input-group">
                                            <input id="code" type="text" name="code" class="form-control" required placeholder="Product Code">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Category/Subcategory <sup class="text-size-20 top-1">*</sup></label>
                                        <div class="input-group">
                                            <select class="form-control" name="subcategory_id" id="" required>
                                                <option disabled="" selected="">==choose category==</option>
                                                @foreach ($categories as $category)
                                                  <option value="{{$category->id}}" style="color: blue" disabled="">{{$category->category_name}}</option>
                                                  @foreach ($subcategories as $subcategory)
                                                    @if ($subcategory->category_id == $category->id)
                                                        <option value="{{$subcategory->id}}">---- {{$subcategory->subcategory_name}}</option>
                                                    @endif
                                                  @endforeach
                                                @endforeach
                                              </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Child Category <sup class="text-size-20 top-1">*</sup></label>
                                        <div class="input-group">
                                            <select name="childcategory_id" class="form-control">
                                                <option value="1">1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Brand <sup class="text-size-20 top-1">*</sup></label>
                                        <div class="input-group">
                                            <select name="brand_id" class="form-control">
                                                @foreach ($brands as $brand)
                                                    <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Pickup Point</label>
                                        <div class="input-group">
                                            <select name="pickup_point_id" class="form-control">
                                                @foreach ($pickpuppoints as $pickpuppoint)
                                                    <option value="{{$pickpuppoint->id}}">{{$pickpuppoint->pickup_point_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Unit <sup class="text-size-20 top-1">*</sup></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="unit" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Tags</label>
                                        <input type="text" name="tags" class="form-control" data-role="tagsinput">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Purchase Price</label>
                                        <div class="input-group">
                                            <input id="purchase_price" type="text" name="purchase_price" class="form-control" placeholder="Purchase Price">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Selling Price <sup class="text-size-20 top-1">*</sup></label>
                                        <div class="input-group">
                                            <input id="selling_price" type="text" name="selling_price" class="form-control" required placeholder="Selling Price">
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
                                            <select name="warehouse" class="form-control">
                                                @foreach ($warehouses as $warehouse)
                                                <option value="{{$warehouse->id}}">{{$warehouse->warehouse_name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Stock</label>
                                        <div class="input-group">
                                            <input id="stock_quantity" type="text" name="stock_quantity" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="demo-color-input" class="form-label">Color</label>
                                            <input class="form-control form-control-color-picker" name="color" type="color" value="#5052FC" id="demo-color-input">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Size</label>
                                            <input id="size" type="text" name="size" class="form-control" data-role="tagsinput">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Page Details</label>
                                        <textarea class="form-control textarea" name="description" id="summernote" rows="4" ></textarea> 
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Video Embed Code</label>
                                        <textarea class="form-control textarea" name="video"  rows="2" ></textarea>
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
