@include('header')
  <div class="wrapper">
    @include('sidebar')

      <div class="main">
 @include('nav')








   <h3 class="txt-green text-center mt-4"  >Promotion</h3>


   @if ($errors->any())
                    <div class="alert alert-danger"style="width:500px;   margin: 0 auto ">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif



                @if(Session::has('message'))
<p class="alert alert-info"  style="width:500px;   margin: 0 auto ">{{ Session::get('message') }}</p>
@endif



<form action="{{route('promotion.store')}}" method="post">

@csrf
<div class="card">
    <div class="card-body">
   <div class="container mt-4">


  


  

   <div class="row">


   <h4 class=" mt-4">Promotion Form</h4>


   <div class="col-3">


<div class="form-group">

<label>College: <span class="text-danger">*</span> </label>
<select name="college_id"  >
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




   <div class="col-3">
   <div class="form-group">

<label>Classroom: <span class="text-danger">*</span> </label>
<select name="classroom_id"  >
    <option value="" disabled>Choose Classroom</option>
       
 </select>


</div> 

   <!-- end one col -->
   </div>

   <div class="col-3">
  


<div class="form-group">

<label>Section: <span class="text-danger">*</span> </label>
<select name="section_id"  >
        <option value="" disabled>Choose Classroom</option>
 
 </select>


</div> 


   <!-- end one col -->
   </div>






   <div class="col-3">
                                <div class="form-group">
                                    <label for="academic_year">academic_year : <span class="text-danger">*</span></label>
                                    <select   name="academic_year">
                                        <option selected disabled >Choose Academic year...</option>
                                        @php
                                            $current_year = date("Y");
                                        @endphp
                                        @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                            <option value="{{ $year}}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>





   <!-- end row -->
   </div>



   <!-- Row Tow -->
   <div class="row">


   <h4 class=" mt-4">Promotion TO</h4>


   <div class="col-3">


<div class="form-group">

<label>College: <span class="text-danger">*</span> </label>
<select name="college_id_new" >
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




   <div class="col-3">
   <div class="form-group">

<label>Classroom: <span class="text-danger">*</span> </label>
<select name="classroom_id_new"  >
    <option value="" disabled>Choose Classroom</option>
       
 </select>


</div> 

   <!-- end one col -->
   </div>

   <div class="col-3">
  


<div class="form-group">

<label>Section: <span class="text-danger">*</span> </label>
<select name="section_id_new"  >
        <option value="" disabled>Choose Classroom</option>
 
 </select>


</div> 


   <!-- end one col -->
   </div>







   <div class="col-3">
                                <div class="form-group">
                                    <label for="academic_year">academic_year : <span class="text-danger">*</span></label>
                                    <select   name="academic_year_new">
                                        <option selected disabled>Choose academic_year_new ...</option>
                                        @php
                                            $current_year = date("Y");
                                        @endphp
                                        @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                            <option value="{{ $year}}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>  



   <!-- end row -->
   </div>

 


 <button   type="submit" class="btn bg-color2 btn-sm mt-3">Save</button>



</form>















</div>
</div>


   <!-- container -->
   </div>

  

   

   <script>
$(document).ready(function () {

    $('select[name="college_id"]').on('change', function () {
      
        var college_id = $(this).val();
        if(college_id){
            $.ajax({
                url: "{{ URL::to('classes') }}/"+college_id,
                type: "GET",
                dataType: "json",

              success: function(data) {
                 $('select[name="classroom_id"]').empty();
                 $.each(data, function (key, value) { 
                    $('select[name="classroom_id"]').append('<option value="' + key + '">' + value + '</option>') 

                 });
        
              },
            });

        }else {
            console.log('AJAX load did not work');
            }
    });


    $('select[name="college_id"]').on('change', function () {

        var college_id = $(this).val();

        if(college_id){
            $.ajax({
                url: "{{ URL::to('getsection') }}/"+college_id,
                type: "GET",
                dataType: "json",

              success: function(data) {
                 $('select[name="section_id"]').empty();
                 $('select[name="section_id"]').append('<option selected disabled > Choose Section...</option>');      
                 $.each(data, function (key, value) { 
                    $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>')   
                 });
              },
            });

        }else{
            console.log('AJAX load did not work');

        }

    });  
    $('select[name="college_id_new"]').on('change', function () {
      
        var college_id = $(this).val();
        if(college_id){
            $.ajax({
                url: "{{ URL::to('classes') }}/"+college_id,
                type: "GET",
                dataType: "json",

              success: function(data) {
                 $('select[name="classroom_id_new"]').empty();
                 $.each(data, function (key, value) { 
                    $('select[name="classroom_id_new"]').append('<option value="' + key + '">' + value + '</option>') 

                 });
        
              },
            });

        }else {
            console.log('AJAX load did not work');
            }
    });


    $('select[name="college_id_new"]').on('change', function () {

        var college_id = $(this).val();

        if(college_id){
            $.ajax({
                url: "{{ URL::to('getsection') }}/"+college_id,
                type: "GET",
                dataType: "json",

              success: function(data) {
                 $('select[name="section_id_new"]').empty();
                 $('select[name="section_id_new"]').append('<option selected disabled > Choose Section...</option>');      
                 $.each(data, function (key, value) { 
                    $('select[name="section_id_new"]').append('<option value="' + key + '">' + value + '</option>')   
                 });
              },
            });

        }else{
            console.log('AJAX load did not work');

        }

    });  
});



</script>


 @include('footer')
