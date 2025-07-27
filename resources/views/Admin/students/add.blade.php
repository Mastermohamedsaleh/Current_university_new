@include('header')
  <div class="wrapper">
    @include('sidebar')

      <div class="main">
 @include('nav')





<div class="container mt-3">

<h3 class="txt-green text-center">Student</h3>




<div class="card">



<div class="card-body">

<legend><span class="number bg-color2"><i class="fa-solid fa-pen"></i></span> Write info Student</legend>

 <!-- Message Success -->
 @if(Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif
<!-- End Success -->

 <!-- Message Error -->
@if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
@endif
 <!-- End Message Error -->



<form action="{{route('students.store')}}" method="post">



@csrf


<div class="row">





<div class="col-md-6">
<div class="form-group">
 <label>Name : <span class="text-danger">*</span></label>
 <input  type="text" name="name" >
</div>             
<!-- end one col -->
</div>

<div class="col-md-6">


<div class="form-group">
 <label>Email : <span class="text-danger">*</span></label>
 <input  type="email" name="email"     require>
</div>   

<!-- end one two -->
</div>

<div class="col-md-6">


<div class="form-group">
 <label>Password : <span class="text-danger">*</span></label>
 <input  type="password" name="password"     require>
</div> 


<!-- end one three -->
</div>

<div class="col-md-6">


<div class="form-group">
 <label>Ssn : <span class="text-danger">*</span></label>
 <input  type="text" name="ssn"     require>
</div> 


<!-- end one four -->
</div>

<div class="col-md-6">


<div class="form-group">

<label>College: <span class="text-danger">*</span> </label>
<select name="college_id" >
        <option value="" >Choose College</option>
            @foreach($colleges as $college) 
          
        <option value="{{$college->id}}" >{{$college->name}}</option>
      
            @endforeach
 </select>


</div> 


<!-- end one five -->
</div>

<div class="col-md-6">


<div class="form-group">

<label>Classroom: <span class="text-danger">*</span> </label>
<select name="classroom_id"   >
 <option value="" disabled>Choose Classroom</option>
       
 </select>


</div> 


<!-- end one six -->
</div>

<div class="col-md-6">


<div class="form-group">

<label>Section:  </label>
<select name="section_id"   >
        <option value="" disabled>Choose Classroom</option>
 
 </select>


</div> 


<!-- end one seven -->
</div>
<div class="col-md-6">


<div class="form-group">

<label>Gender: <span class="text-danger">*</span> </label>
<select name="gender_id"   >
        <option value="" disabled>Choose Gender</option>
            @foreach($genders as $gender) 
            <option value="{{$gender->id}}" >{{$gender->type}}</option>
            @endforeach
 </select>


</div> 


<!-- end one eigth -->
</div>
<div class="col-md-6">


<div class="form-group">

<label>Nationalitie: <span class="text-danger">*</span> </label>
<select name="nationalitie_id" >
        <option value="" disabled>Choose Nationalitie</option>
            @foreach($nationalities as $nationalitie) 
            <option value="{{$nationalitie->id}}" >{{$nationalitie->nationalitie}}</option>
            @endforeach
 </select>


</div> 


<!-- end one ten -->
</div>
<div class="col-md-6">


<div class="form-group">

<label>Current Year: <span class="text-danger">*</span> </label>
<select class="custom-select mr-sm-2" name="academic_year" >
                                    <option selected disabled>Choose Year...</option>
                                    @php
                                        $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}">{{ $year }}</option>
                                    @endfor
                                </select>


</div> 


<!-- end one ten -->
</div>





<!-- end Row -->
</div>



 
<button type="submit" class="btn bg-color2 btn-sm m-3">Save</button>
 


</form>










    <!-- end card body -->
</div>





<!-- end card -->
</div>

<!-- end container -->
</div>



@include('footer')
