@include('header')
  <div class="wrapper">
    @include('sidebar')

      <div class="main">
 @include('nav')








<div class="container mt-3" >

<h3 class="txt-green text-center">Doctor</h3>






 <!-- Message Success -->
 @if(Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif
<!-- End Success -->



<div class="card">


<div class="card-body">


<form action="{{route('doctors.store')}}" method="post">



@csrf


<div class="row">


<legend><span class="number  bg-color2"><i class="fa-solid fa-pen"></i></span> Write info Doctor</legend>


<div class="col-md-6">

<div class="form-group">
 <label>Name : <span class="text-danger">*</span></label>
 <input  type="text" name="name"   >
</div>     


@error('name')
            <div class="alert alert-danger mt-1">{{ $message }}</div>
         @enderror
<!-- end one col -->
</div>

<div class="col-md-6">


<div class="form-group">
 <label>Email : <span class="text-danger">*</span></label>
 <input  type="email" name="email"    require>
</div>   

@error('email')
            <div class="alert alert-danger mt-1">{{ $message }}</div>
         @enderror

<!-- end one two -->
</div>

<div class="col-md-6">


<div class="form-group">
 <label>Password : <span class="text-danger">*</span></label>
 <input  type="password" name="password"    require>
</div> 
@error('password')
            <div class="alert alert-danger mt-1">{{ $message }}</div>
         @enderror

<!-- end one three -->
</div>

<div class="col-md-6">


<div class="form-group">
 <label>Ssn : <span class="text-danger">*</span></label>
 <input  type="text" name="ssn"    require>
</div> 
@error('ssn')
            <div class="alert alert-danger mt-1">{{ $message }}</div>
         @enderror

<!-- end one four -->
</div>
<div class="col-md-6">


<div class="form-group">
 <label>Address : <span class="text-danger">*</span></label>
 <input  type="text" name="address"    require>
</div> 

@error('Address')
            <div class="alert alert-danger mt-1">{{ $message }}</div>
         @enderror


<!-- end one four -->
</div>





<div class="col-md-6">


<div class="form-group">

<label>Gender: <span class="text-danger">*</span> </label>
<select name="gender_id" >
        <option value="" disabled>Choose Gender</option>
            @foreach($genders as $gender) 
            <option value="{{$gender->id}}" >{{$gender->type}}</option>
            @endforeach
 </select>
 @error('gender_id')
            <div class="alert alert-danger mt-1">{{ $message }}</div>
         @enderror

</div> 


<!-- end one eigth -->
</div>
<div class="col-md-6">


<div class="form-group">

<label>Nationalitie: <span class="text-danger">*</span> </label>
<select name="nationalitie_id">
        <option value="" disabled>Choose Nationalitie</option>
            @foreach($nationalities as $nationalitie) 
            <option value="{{$nationalitie->id}}" >{{$nationalitie->nationalitie}}</option>
            @endforeach
 </select>


 @error('nationalitie_id')
            <div class="alert alert-danger mt-1">{{ $message }}</div>
         @enderror

</div> 


<!-- end one ten -->
</div>
<div class="col-md-6">


<div class="form-group">

<label>Joining_Date: <span class="text-danger">*</span> </label>


<input  name="Joining_Date"  type="date" id="start" name="trip-start" value="2023-07-22" min="2018-01-01" max="2024-12-31" />


        @error('Joining_Date')
            <div class="alert alert-danger">{{ $message }}</div>
         @enderror


</div> 


<!-- end one ten -->
</div>


   
<div class="col-12">
  

<select name="college_id" id="">
  
  @foreach($colleges as $college)
<option value="{{$college->id}}">{{$college->name}}</option>
 @endforeach
</select>

</div>




<!-- end Row -->
</div>



 
<button type="submit" class="btn mt-3  bg-color2 btn-sm ">Save</button>
 


</form>




</div>
    
</div>


<!-- end container -->
</div>











@include('footer')
