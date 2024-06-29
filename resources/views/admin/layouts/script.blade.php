<script src="{{asset('/')}}admin/assets/js/plugins/apexcharts.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/pages/dashboard-ecommerce.js"></script><!-- [Page Specific JS] end -->
<!-- Required Js -->
<script src="{{asset('/')}}admin/assets/js/plugins/popper.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/plugins/simplebar.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/plugins/bootstrap.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/fonts/custom-font.js"></script>
<script src="{{asset('/')}}admin/assets/js/pcoded.js"></script>
<script src="{{asset('/')}}admin/assets/js/plugins/feather.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
<script src="{{asset('/')}}admin/assets/js/plugins/sweetalert2.all.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/plugins/toastr.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"> </script>

<!-- datatable Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/plugins/jquery.dataTables.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/plugins/dataTables.bootstrap5.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/plugins/buttons.colVis.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/plugins/buttons.print.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/plugins/pdfmake.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/plugins/jszip.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/plugins/dataTables.buttons.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/plugins/vfs_fonts.js"></script>
<script src="{{asset('/')}}admin/assets/js/plugins/buttons.html5.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/plugins/buttons.bootstrap5.min.js"></script>
<!--Internal Fileuploads js-->
<script src="{{asset('/')}}admin/assets/fileuploads/js/fileupload.js"></script>
<script src="{{asset('/')}}admin/assets/fileuploads/js/file-upload.js"></script>
<!-- Summernote -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
<script>
  $(document).ready(function() {
      $('#summernote').summernote({
          height: 300,
      });
  });
</script>
 <!-- Script -->
 
 <script>
   // [ Column Selectors ]
   $('#cbtn-selectors').DataTable({
     dom: 'Bfrtip',
     buttons: [{
         extend: 'copyHtml5',
         exportOptions: {
           columns: [0, ':visible']
         }
       },
       {
         extend: 'excelHtml5',
         exportOptions: {
           columns: ':visible'
         }
       },
       {
         extend: 'csv',
         exportOptions: {
           columns: ':visible'
         }
       },
       {
         extend: 'print',
         exportOptions: {
           columns: ':visible'
         }
       },
       {
         extend: 'pdfHtml5',
         exportOptions: {
           columns: [0, 1, 2, 5]
         }
       },
       'colvis'
     ]
   });

</script>
<!-- [Page Specific JS] end -->
<script>
  $(document).ready(function() {
    
      $('#logout').on('click', function(event){
          event.preventDefault();
          // const deleteUrl = $(this).attr('href');
          swal.fire({
              title: "Are you sure you want to logout?",
              text: "You won't be logged in anymore.",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Logout',
              cancelButtonText: 'Cancel'
          })
          .then((result) => {
              if (result.isConfirmed) {
                  window.location.href = "{{ route('admin.logout') }}";
              } else {
                  swal.fire({
                      title: "Ok?",
                      text: "You are not Logout",
                      icon: "info",
                  }); 
              }
          });
      });
  });
</script>
{{-- Delete the Data --}}
<script>
 
  $(document).on('click', '.delete', function() {
        var childcategoryId = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "Once deleted, you won't be able to recover this data!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the delete form
                $('#delete-form-' + childcategoryId).submit();
            } else {
                Swal.fire('Cancelled', 'Your data is safe :)', 'info');
            }
        });
    });
</script>

<script>
    layout_change('light');
</script>
<script>
    layout_sidebar_change('dark');
</script>
<script>
    layout_header_change('dark');
</script>
<script>
    change_box_container('false');
</script>
<script>
    layout_caption_change('true');
</script>
<script>
    layout_rtl_change('false');
</script>
<script>
    preset_change("preset-1");
</script>