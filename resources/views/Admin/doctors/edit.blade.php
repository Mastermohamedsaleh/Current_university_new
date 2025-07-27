@include('header')
  <div class="wrapper">
    @include('sidebar')

      <div class="main">
 @include('nav')





<div class="container mt-3">


<h3 class="txt-green text-center">Doctor</h3>

<div class="card">


 




<div class="card-body">


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



<form action="{{route('doctors.update',$doctor->id)}}" method="post">


@method('PUT')
@csrf


<div class="row">


<legend><span class="number bg-color2">1</span> Edit info Doctor</legend>



<div class="col-md-6">

<div class="form-group">
 <label>Name : <span class="text-danger">*</span></label>
 <input  type="text" name="name"  value= "{{$doctor->name}}"   >
</div>             
<!-- end one col -->
</div>

<div class="col-md-6">


<div class="form-group">
 <label>Email : <span class="text-danger">*</span></label>
 <input  type="email" name="email"  value= "{{$doctor->email}}"    require>
</div>   

<!-- end one two -->
</div>



<div class="col-md-6">


<div class="form-group">
 <label>Ssn : <span class="text-danger">*</span></label>
 <input  type="text" name="ssn" value= "{{$doctor->ssn}}"     require>
</div> 


<!-- end one four -->
</div>





<div class="col-md-6">

<div class="form-group">
 <label>Address : <span class="text-danger">*</span></label>
 <input  type="text" name="address" value="{{$doctor->Address}}"  require>
</div>



</div>





<div class="col-md-6">


<div class="form-group">

<label>Gender: <span class="text-danger">*</span> </label>
<select name="gender_id" >
        <option value="" disabled>Choose Gender</option>
            @foreach($genders as $gender) 
            <option value="{{$gender->id}}" {{ $gender->id == $doctor->gender_id ? 'selected' : '' }} >{{$gender->type}}</option>
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
            <option value="{{$nationalitie->id}}" {{ $nationalitie->id == $doctor->nationalitie_id ? 'selected' : '' }}  >{{$nationalitie->nationalitie}}</option>
            @endforeach
 </select>


</div> 


<!-- end one ten -->
</div>
<div class="col-md-6">


<div class="form-group">

<label>Current Year: <span class="text-danger">*</span> </label>


<input    type="text" name="Joining_Date"  value="{{$doctor->Joining_Date}}" id="">


</div> 


<!-- end one ten -->
</div>




<div class="col">
  
<label for="">College: <span class="text-danger">*</span></label>

<select name="college_id" id="">
  
  @foreach($colleges as $college)
<option value="{{$college->id}}">{{$college->name}}</option>
 @endforeach
</select>

</div>


<!-- end Row -->
</div>



 
<button type="submit" class="btn  bg-color2 btn-sm m-3">update</button>
 


</form>










    <!-- end card body -->
</div>





<!-- end card -->
</div>

<!-- end container -->
</div>



@include('footer')
