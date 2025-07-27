@include('header')
  <div class="wrapper">
    @include('sidebar_accountant')

      <div class="main">
 @include('nav')




<div class="container mt-5">








<div class="card">

<div class="card-body">



<h4 class="txt-green text-center">Receipt</h4>

@isset($fee_invoices)
<form action="{{route('receipt.store')}}" method="post">


@csrf
<div class="row">


<input type="hidden" name="student_id" value="{{$student->id}}">
<div class="col-12">
    <label for="">Amount <span class="text-danger">*</span></label>

    <select name="Debit" id="">
      <option value="{{$fee_invoices->amount}}">{{$fee_invoices->amount}}</option>
      <option value="{{$fee_invoices->amount / 2}}">{{$fee_invoices->amount / 2 }}</option>
    </select>
</div>

<div class="col-12">
<label for="">Description <span class="text-danger">*</span></label>
<textarea name="description"  cols="30" rows="10" ></textarea>
</div>






</div>


<button type="submit" class="btn bg-color2 btn-sm mt-3">Submit</button>

</form>
@endisset


</div>


</div>






</div>








 @include('footer')