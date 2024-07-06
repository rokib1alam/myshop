<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta content="Codescandy" name="author" />

    <title>{{ config('app.name', 'Laravel') }}</title>
      
    @include('frontend.layouts.style')

   </head>

   <body>
      <!-- navbar -->
      @include('frontend.layouts.header')
      <main>
         
         @yield('content')

      </main>
      <!-- footer -->
      @include('frontend.layouts.footer')

      <!-- Javascript-->
      @include('frontend.layouts.script')
   </body>

<!-- Mirrored from freshcart.codescandy.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Jul 2024 07:03:09 GMT -->
</html>
