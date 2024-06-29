{{-- <!-- edit.blade.php -->
<form id="editForm" method="post" action="{{ route('coupon.update', $coupon->id) }}">
  @csrf
  @method('PUT')
    <div class="modal-body">
        <div class="form-group">
          <label for="coupon_code" class="col-form-label pt-0">Coupon Code <sup class="text-size-20 top-1">*</sup></label>
            <input type="text" class="form-control" id="coupon_code" name="coupon_code" value="{{$coupon->coupon_code}}" required placeholder="Coupon Code">
        </div>
        <div class="form-group">
          <label for="type" class="col-form-label pt-0">Coupon Type <sup class="text-size-20 top-1">*</sup></label>
            <select name="type" class="form-control">
              <option value="1" {{ $coupon->type == 1 ? 'selected' : '' }}>Fixed</option>
              <option value="2" {{ $coupon->type == 1 ? 'selected' : '' }}>Percentage</option>
            </select>
        </div>
        <div class="form-group">
          <label for="coupon_amount" class="col-form-label pt-0">Amount <sup class="text-size-20 top-1">*</sup></label>
            <input type="text" class="form-control" id="coupon_amount" value="{{$coupon->coupon_amount}}" name="coupon_amount" required placeholder="Coupon Code">
        </div>
        <div class="form-group">
          <label for="valid_date" class="col-form-label pt-0">Valid Date <sup class="text-size-20 top-1">*</sup></label>
            <input type="date" class="form-control" id="valid_date" value="{{$coupon->valid_date}}" name="valid_date" required placeholder="Coupon Code">
        </div>
        <div class="form-group">
          <label for="type" class="col-form-label pt-0">Coupon Type <sup class="text-size-20 top-1">*</sup></label>
            <select name="status" class="form-control">
              <option value="Active" {{ $coupon->type == 'Active' ? 'selected' : '' }}>Active</option>
              <option value="Inactive" {{ $coupon->type == 'Inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">
            <span class="loading d-none">Loading...</span> Submit
          </button>
        </div>
      </div>

</form>

<script type="text/javascript">
  //Submit edited coupon via AJAX
  $('#editForm').submit(function(e) {
        e.preventDefault(); // Prevent default form submission
        var url = $(this).attr('action'); // Form action URL
        var request = $(this).serialize(); // Serialize form data
        // Show loading indicator
        $('.loading').removeClass('d-none');

        $.ajax({
            url: url,
            type: 'POST',
            data: request,
            success: function(data) {
                toastr.success(data.message); // Display success message
                $('#editForm')[0].reset(); // Reset form fields
                $('#editModal').modal('hide'); // Close modal
                $('.loading').addClass('d-none'); // Hide loading indicator

                // Reload the DataTable (example assuming table variable exists)
                table.ajax.reload();
            }
        });
    });
</script> --}}


<!-- edit.blade.php -->
<!-- edit.blade.php -->
<form action="{{ route('coupon.update', $coupon->id) }}" method="post" id="edit-form">
  @csrf
  @method('PUT')
  <div class="form-group">
      <label for="coupon_code">Coupon Code</label>
      <input type="text" class="form-control" id="coupon_code" name="coupon_code" value="{{ $coupon->coupon_code }}" required>
  </div>
  <div class="form-group">
      <label for="type">Coupon Type</label>
      <select name="type" class="form-control">
          <option value="1" {{ $coupon->type == 1 ? 'selected' : '' }}>Fixed</option>
          <option value="2" {{ $coupon->type == 2 ? 'selected' : '' }}>Percentage</option>
      </select>
  </div>
  <div class="form-group">
      <label for="coupon_amount">Amount</label>
      <input type="text" class="form-control" id="coupon_amount" name="coupon_amount" value="{{ $coupon->coupon_amount }}" required>
  </div>
  <div class="form-group">
      <label for="valid_date">Valid Date</label>
      <input type="date" class="form-control" id="valid_date" name="valid_date" value="{{ $coupon->valid_date }}" required>
  </div>
  <div class="form-group">
      <label for="status">Coupon Status</label>
      <select name="status" class="form-control">
          <option value="Active" {{ $coupon->status == 'Active' ? 'selected' : '' }}>Active</option>
          <option value="Inactive" {{ $coupon->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
      </select>
  </div>
  <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">
          <span class="loading d-none">Loading...</span> Submit
      </button>
  </div>
</form>
