@extends('layouts.admin')
@section('title','Categorie')
@section('admin_content')
<div class="pc-container">
  <div class="pc-content">
      <!-- [ breadcrumb ] start -->
      <div class="page-header">
          <div class="page-block">
              <div class="row align-items-center justify-content-between">
                  <div class="col-sm-auto">
                      <div class="page-header-title">
                          <h5 class="mb-0">Category</h5>
                      </div>
                  </div>
                  <div class="col-sm-auto">
                      <ul class="breadcrumb">
                          <button class="btn btn-primary">+ View</button>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
      <!-- [ breadcrumb ] end -->
      <!-- [ Main Content ] start -->
    <div class="row">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="myLargeModalLabel">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('category.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="category_name" class="col-form-label pt-0">Category Name <sup class="text-size-20 top-1">*</sup></label>
                        <input type="text" class="form-control" id="category_name" name="category_name" value="{{ $category->category_name }}" required>
                        <small id="emailHelp" class="form-text text-muted">This is your main category</small>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>
    <!-- [ Main Content ] end -->
  </div>
</div>
@endsection