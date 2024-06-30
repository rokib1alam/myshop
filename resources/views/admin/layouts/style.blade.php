@php
    $setting = App\Models\Setting::first();
@endphp
<link rel="icon" href="{{ url($setting->favicon) }}" type="image/x-icon">
<!-- [Google Font : Public Sans] icon -->
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&amp;display=swap"
    rel="stylesheet"><!-- [Tabler Icons] https://tablericons.com -->
<link rel="stylesheet" href="{{asset('/')}}admin/assets/fonts/tabler-icons.min.css"><!-- [Feather Icons] https://feathericons.com -->
<link rel="stylesheet" href="{{asset('/')}}admin/assets/fonts/feather.css">
<!-- [Font Awesome Icons] https://fontawesome.com/icons -->
<link rel="stylesheet" href="{{asset('/')}}admin/assets/fonts/fontawesome.css">
<!-- [Material Icons] https://fonts.google.com/icons -->
<link rel="stylesheet" href="{{asset('/')}}admin/assets/fonts/material.css"><!-- [Template CSS Files] -->
<link rel="stylesheet" href="{{asset('/')}}admin/assets/css/style.css" id="main-style-link">
<link rel="stylesheet" href="{{asset('/')}}admin/assets/css/style-preset.css">
<link rel="stylesheet" href="{{asset('/')}}admin/assets/css/custom.css">
<link rel="stylesheet" href="{{asset('/')}}admin/assets/css/plugins/sweetalert.css">
<link rel="stylesheet" href="{{asset('/')}}admin/assets/css/plugins/sweetalert.css">
<link rel="stylesheet" href="{{asset('/')}}admin/assets/css/plugins/toastr.min.css">
<!-- data tables css -->
<link rel="stylesheet" href="{{asset('/')}}admin/assets/css/plugins/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="{{asset('/')}}admin/assets/css/plugins/buttons.bootstrap5.min.css">
<!-- fileupload-custom css -->
<link rel="stylesheet" href="{{asset('/')}}admin/assets/css/plugins/dropzone.min.css">
<link rel="stylesheet" href="{{asset('/')}}admin/assets/css/plugins/bootstrap-switch-button.min.css"><!-- [Page specific CSS] -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">

