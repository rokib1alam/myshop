@extends('layouts.admin')
@section('title','Child Categorie')
@section('admin_content')
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center justify-content-between">
                    <div class="col-sm-auto">
                        <div class="page-header-title">
                            <h5 class="mb-0">Child category</h5>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <ul class="breadcrumb">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">+ Add New</button>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
      <div class="row">
        <!-- HTML5 Export Buttons table start -->
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header table-card-header">
              <h5>All child categories list here</h5>
            </div>
            <div class="card-body">
              <div class="dt-responsive table-responsive">
                <table id="" class="table table-striped table-bordered nowrap table-sm ytable">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>Childcategorie Name</th>
                      <th>Categorie Name</th>
                      <th>Subcategorie Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Data populated by DataTables via AJAX -->
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>SL</th>
                      <th>Childcategorie Name</th>
                      <th>Categorie Name</th>
                      <th>Subcategorie Name</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div><!-- HTML5 Export Buttons end -->

      </div>
      <!-- [ Main Content ] end -->
    </div>
</div>
  <!-- Category Insert Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="myLargeModalLabel">Add New Child Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('childcategory.store')}}" method="post" id="add-form">
              @csrf
              <div class="modal-body">
                <div class="form-group">
                  <label for="category_name" class="col-form-label pt-0">Category/Subcategory <sup class="text-size-20 top-1">*</sup></label>
                    <select class="form-control" name="subcategory_id" id="" required>
                      @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @foreach ($subcategories as $subcategory)
                          @if ($subcategory->category_id == $category->id)
                              <option value="{{$subcategory->id}}">---- {{$subcategory->subcategory_name}}</option>
                          @endif
                        @endforeach
                      @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label for="childcategory_name" class="col-form-label pt-0">Child Category Name <sup class="text-size-20 top-1">*</sup></label>
                    <input type="text" class="form-control" id="childcategory_name" name="childcategory_name" required>
                    <small id="emailHelp" class="form-text text-muted">This is your childcategory</small>
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-primary"> <span class="d-none"> loading ......</span> Submit</button>
                  </div>
              </div>
            </form>
        </div>
    </div>
</div>

 <!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="editModalLabel">Edit Child Category</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <!-- Edit form content will be loaded here -->
          </div>
      </div>
  </div>
</div>
  <!-- Script -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script type="text/javascript">
    $(function childcategory(){
      var table=$('.ytable').DataTable({
        processing: true,
            serverSide: true,
            ajax: "{{ route('childcategory.index') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'childcategory_name', name: 'childcategory_name' },
                { data: 'category_name', name: 'category_name' },
                { data: 'subcategory_name', name: 'subcategory_name' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
      });
    });
// For Edit Child Category
    $('body').on('click', '.edit', function() {
        let id = $(this).data('id');
        $.get("childcategory/" + id + "/edit", function(data) {
            $('.modal-body').html(data);
        });
    });
  </script>
  
@endsection