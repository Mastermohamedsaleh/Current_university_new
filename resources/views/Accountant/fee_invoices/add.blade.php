@include('header')
  <div class="wrapper">
    @include('sidebar_accountant')

      <div class="main">
 @include('nav')




<div class="container">

 <div class="card mt-5">


 <div class="card-body">

 <h4 class="txt-green text-center">Add Invoice</h4>
 
 <form action="{{route('fee_invoices.store')}}" method="POST">


 @csrf


 <div class="row">







 <div class="col">
       <label for="Name" class="mr-sm-2">Name Student : <span class="text-danger">*</span></label>
       <select class="form-select" name="student_id" required>
               <option value="{{$student->id}}">{{ $student->name }}</option>
       </select>
   </div>

<div class="col-4">
<div class="form-group">
 <label>Fee : <span class="text-danger">*</span></label>


 <select name="fee_id" id="" class="form-select">
 @foreach($fees as $fee)
       <option value="{{$fee->id}}">{{$fee->title}}</option>
 @endforeach
 </select>


</div>             
<!-- end one col -->
</div>


<div class="col-4">
<div class="form-group">
 <label>Amount : <span class="text-danger">*</span></label>
 <select name="amount" id="" class="form-select">
 @foreach($fees as $fee)
     <option value="{{$fee->amount}}">{{ $fee->amount }}</option>
  @endforeach
 </select>

</div>             
<!-- end one col -->
</div>




<input type="hidden" name="classroom_id" value="{{$student->classroom_id}}">
<input type="hidden" name="college_id" value="{{$student->college_id}}">
<input type="hidden" name="section_id" value="{{$student->section_id}}">















 <!-- end Row -->
 </div>

 @if($student_fee)

 @else
 <button type="submit" class="btn bg-color2 btn-sm mt-3" >Submit</button>
@endif

 </form>






 </div>



 </div>

 </div>




 @include('footer')