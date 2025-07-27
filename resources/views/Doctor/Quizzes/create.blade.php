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



<div class="container mt-5">

<form action="{{route('quizzes.store')}}" method="post" autocomplete="off">

@csrf



<div class="card">

<div class="card-body">



<div class="row">


<legend><span class="number bg-color2"><i class="fa-solid fa-pen"></i></span> Write basic info</legend>


<div class="col-12">

     <label for="">Type Quiz : <span class="text-danger">*</span></label>

      <select name="type_quiz" id="">
         <option value="0">Easy Quiz</option>
         <option value="1">Hard Quiz</option>
      </select>

</div>


<div class="col-6">

<label > Name Quiz : <span class="text-danger">*</span></label>

<input type="text" name="name" >

</div>
<div class="col">
                                        <div class="form-group">
                                            <label > course : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="course_id">
                                                <option selected disabled>Choose course  ...</option>
                                                @foreach($courses as $course)
                                                    <option  value="{{ $course->id }}">{{ $course->name }}</option>
                                                @endforeach
                                            </select>
                </div>
        </div>




        <div class="col-6">
        <label > Start_time : <span class="text-danger">*</span></label>
         <input type="datetime-local" name="start_time">
        </div>
        <div class="col-6">
        <label > End_time : <span class="text-danger">*</span></label>
         <input type="datetime-local" name="end_time">
        </div>



     


</div>


<button type="submit" class="btn bg-color2">Save</button>
</div>
</div>


</form>








</div>








@include('footer')