@include('header')
  <div class="wrapper">
  @include('sidebar_doctor')

      <div class="main">
@include('nav')






@if ($errors->any())
                    <div class="alert alert-danger" style="width:300px; margin:0px auto">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif



                @if(Session::has('message'))
<p class="alert alert-info" style="width:300px; margin:0px auto">{{ Session::get('message') }}</p>
@endif
<div class="container mt-5">
<div class="card">



<div class="card-body">



<form action="{{route('lecture.store')}}" method="post"  enctype="multipart/form-data">

@csrf



<input type="hidden" name="course_id" value="{{$course_id}}">
<div class="row">


<legend><span class="number bg-color2"><i class="fa-solid fa-pen"></i></span> Add New Lecture</legend>
<div class="col-12">

<label for="">Title<span class="text-danger">*</span> </label>
<input type="text" name="title" >

</div>





<div class="col-12">                               
<div class="form-group">
    <label for="academic_year">Attachment : <span class="text-danger">*</span></label>
    <input type="file" accept="application/pdf" name="file_name" >
</div>
                               




</div>





</div>


<button type="submit" class="btn bg-color2 btn-sm mt-2">Add</button>

</form>













</div>





</div>


</div>





@include('footer')














