@include('header')
  <div class="wrapper">
    @include('sidebar')

      <div class="main">
     @include('nav')



     



     <div class="contanier">



     

<div class="container">




<form action="{{route('setting.update','test')}}" method="post"  autocomplete="off" enctype="multipart/form-data">
@csrf
@method('PUT')

<h3 class="ms-2">Setting</h3>



      <!-- Message Success -->
      @if(Session::has('message'))
<p class="alert alert-info" style="width:500px;   margin: 0 auto ">{{ Session::get('message') }}</p>
@endif
<!-- End Success -->

 <!-- Message Error -->
@if ($errors->any())
                    <div class="alert alert-danger" style="width:500px;   margin: 0 auto ">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
@endif
 <!-- End Message Error -->

     <div class="card mt-2">

<div class="card-body">

<p>Ganeral Setting Such as , Site Title Site Description and Addrees and so on .</p>


<div class="row">

@foreach($settings as $setting)


<input type="hidden" value="{{$setting->id}}" name="setting_id">

    <div class="col-6">


<label for="">Site Title</label>
<input type="text" value="{{$setting->unvirsty_name}}" name = "unvirsty_name" >

<label for="">Site Phone</label>
<input type="text" value="{{$setting->phone}}" name="phone"  >


<label for="">Site Logo</label>
<input type="file" name="logo" class="form-control">


<label for="">Email</label>
<input type="text" value="{{$setting->email}}" name="email">

<label for="">Address</label>
<input type="text" value="{{$setting->address}}" name="address" >


<label for="">Link Facebook</label>
<input type="text" value="{{$setting->link_facebook}}" name="link_facebook">

<label for="">Link Youtube</label>
<input type="text" value="{{$setting->link_youtube}}" name="link_youtube">



<label for="">Link Linked In</label>
<input type="text" value="{{$setting->link_linked_in}}" name="link_linked_in">
@endforeach

<button class="btn bg-color2 btn-sm">Update</button>

<!-- end col -->
    </div>

<!-- end row -->
</div>
</form>





<!-- end card-boay -->
</div>



            <!-- end card -->
        </div>










</div>









     @include('footer')
