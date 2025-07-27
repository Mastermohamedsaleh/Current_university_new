@include('header')
  <div class="wrapper">
    @include('sidebar')

      <div class="main">
 @include('nav')





<h3 class="text-center txt-green">Add Graduated Students</h3>

@if(Session::has('message'))
<p class="alert alert-info" style="width:500px;   margin: 0 auto ">{{ Session::get('message') }}</p>
@endif
                @if(Session::has('message_error'))
<p class="alert alert-danger" style="width:500px;   margin: 0 auto ">{{ Session::get('message_error') }}</p>
@endif

<div class="card">

<div class="card-body">

<form action="{{route('graduated.store')}}" method="post">

@csrf
   <div class="container mt-4">

   <div class="row">


   <h4 class=" mt-4">Add Graduated</h4>


   <div class="col">


<div class="form-group">

<label>College: <span class="text-danger">*</span> </label>
<select name="college_id" >
        <option value="" >Choose College</option>
            @foreach($colleges as $college) 
          
        <option value="{{$college->id}}" >{{$college->name}}</option>
      
            @endforeach
 </select>


 @error('college_id')
            <div class="alert alert-danger mt-1">{{ $message }}</div>
         @enderror
</div>

</div> 


<!-- 

   <div class="col-4">
   <div class="form-group">

<label>Classroom: <span class="text-danger">*</span> </label>
<select name="classroom_id">
    <option value="" disabled>Choose Classroom</option>
       
 </select>

 
 @error('classroom_id')
            <div class="alert alert-danger mt-1">{{ $message }}</div>
         @enderror

</div> 

    end one col -->
   <!-- </div>  -->

   <div class="col-4">
  


<div class="form-group">

<label>Section:  </label>
<select name="section_id" >
        <option value="" disabled>Choose Sections</option>
 
 </select>



</div> 


    <!-- end one col  -->
   </div> 


</div>

</div>
<button type="submit" class="btn bg-color2 btn-sm m-4" >Submit</button>

</form>


</div>
</div>


@include('footer')

