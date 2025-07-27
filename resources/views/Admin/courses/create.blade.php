@include('header')
  <div class="wrapper">
    @include('sidebar')

      <div class="main">
 @include('nav')


 <h3 class="txt-green text-center mt-3">Add Course</h3>


 <div class="container ">


<form action="{{route('course.store')}}" method="post" >


 <div class="card mt-2">

<div class="card-body">




 
@if ($errors->any())
                    <div class="alert alert-danger" style="width:500px;   margin: 0 auto ">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif



                @if(Session::has('message'))
<p class="alert alert-info" style="width:500px;   margin: 0 auto ">{{ Session::get('message') }}</p>
@endif
                @if(Session::has('danger'))
<p class="alert alert-danger" style="width:500px;   margin: 0 auto ">{{ Session::get('danger') }}</p>
@endif



@csrf
 <div class="row">





 <div class="col-4">
    <label>Collge: <span class="text-danger">*</span> </label>

    <select name="college_id" >
    <option value="" >Choose College</option>
@foreach($colleges as $college)
  <option value="{{$college->id}}">{{$college->name}}</option>
@endforeach
</select>

    </div>



    

    <div class="col-4">


    <div class="form-group">

<label>Classroom: <span class="text-danger">*</span> </label>
<select name="classroom_id" >
 <option value="" disabled>Choose Classroom</option>
       
 </select>


</div> 
    

    </div>

    <div class="col-4">

    <div class="form-group">

<label>Section:  </label>
<select name="section_id" >
        <option value="" disabled>Choose Classroom</option>
 
 </select>


</div>
    </div>





    <div class="col">

    <select name="semester" id="">
      <option value="semester1">semester 1</option>
      <option value="semester2">semester 2</option>
    </select>


    </div>



       
      



<!-- end Row -->

</div>

















<!-- end card-body -->


</div>

<!-- end card -->

</div>









<div class="card mt-3">

<div class="card-body">



<div class="create" id="create"></div>

<a href="javascript:void(0)" class="btn  bg-color2 addrow mt-3" id="addrow">+</a>



<button type="submit" class="btn bg-color2  float-end mt-3">Add</button>



</div>
</div>





</form>


 <!-- end container -->
 </div>



 @include('footer')

<script>
$(document).ready(function(){
  $(".addrow").click(function(){
    var row = `
    <div class="row mt-2">
    <div class="col-lg-3 col-md-6 col-sm-6">
    <label>Name Course: <span class="text-danger">*</span> </label>
    <input type="text" name="name[]" >
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
    <label>Doctor : <span class="text-danger">*</span> </label>
    <select name="doctor_id[]" class="selectpicker" >
    <option value="" >Choose Doctor</option>
@foreach($doctors as $doctor)
  <option value="{{$doctor->id}}">{{$doctor->name}}</option>
@endforeach
</select>

    </div>




    <div class="col-lg-3 col-md-6 col-sm-6">
    <label class="text-danger">Delete Row </label>
    <a hreg="javascript:void(0)" class="btn btn-danger deleteRow" >-</a>
    </div>
    </div>
      `
     $('.create').append(row);

     $(".deleteRow").click(function(){

      $(this).parent().parent().remove();
           
     });



  });
});



</script>
