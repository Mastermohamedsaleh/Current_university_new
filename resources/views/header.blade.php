<!DOCTYPE html>
<html lang="en" >
  <head>

 <meta name="csrf-token" content="{{ csrf_token() }}" />

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @if(auth('admin')->check())
    <title>Admin Dashboard</title>
    <link rel="website icon" type="png" href="assets/images/logo2.png" >
     @elseif(auth('doctor')->check())
    <title>Doctor Dashboard</title>
    <link rel="website icon" type="png" href="assets/images/logo2.png" >
     @elseif(auth('student')->check())
    <title>Student Dashboard</title>
    <link rel="website icon" type="png" href="assets/images/logo2.png" >
     @else
    <title>Accountant Dashboard</title>
    <link rel="website icon" type="png" href="assets/images/logo2.png" >
     @endif
   

    <!-- font -->
    <script
      src="https://kit.fontawesome.com/c1ef89d5e0.js"
      crossorigin="anonymous"
      defer
    ></script>

    <!-- bootstrap 5 links (CDN) -->
    <!-- <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="Styles/style.css" />
   <link rel="stylesheet" href="{{ URL::asset('Styles/style.css') }}" /> -->

<!-- DAtatable -->
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.css" rel="stylesheet">
<!-- DAtatable -->
<!-- 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer ></script> -->
    <script src="{{ URL::asset('Script/script.js') }}" defer></script> 
 

   

<!-- Jquery -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
<!-- Jquery -->    



<!-- download Jquery -->
<script src="{{ URL::asset('Script/jquery_main.js') }}"></script>
<!-- end download Jquery -->


<link rel="stylesheet" href="{{ URL::asset('Styles/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('Styles/style.css')}}" />
    <script defer src="{{URL::asset('Script/bootstrap.bundle.min.js')}}"></script>
    <script defer src="{{URL::asset('Script/index.js')}} "></script>


    @livewireStyles

  </head>
  <body>



  