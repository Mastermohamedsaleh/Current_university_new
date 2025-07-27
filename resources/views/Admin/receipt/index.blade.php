@include('header')
  <div class="wrapper">
    @include('sidebar')

      <div class="main">
 @include('nav')




<div class="container mt-5">



 
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










<div class="card mb-3">



<div class="card-body">


<form action="{{url('search_receipt')}}" method="get">
<div class="row">



<div class="col-4">
<label for="">Name<span class="text-danger">*</span></label>
<input type="text" name="name">
<!-- end col -->
</div>

<div class="col-4">
<label for="">Amount<span class="text-danger">*</span></label>
<input type="number" name="amount">
<!-- end col -->
</div>

<div class="col-4" style="margin:auto">
<button type="submit" class="btn btn-primary">Search</button>
<!-- end col -->
</div>






<!-- end Row -->
</div>

</form>



<!-- end car-body search -->
</div>



<!-- end card seach -->
</div>










<div class="card">



<h4 class="text-center text-primary mt-3"> سندات القبض</h4>

<div class="caed-body">


<div class="table-responsive">



<div class="container">

                                    <table  class="table  table-hover table-sm table-bordered p-0 "
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>الاسم</th>
                                            <th>المبلغ</th>
                                            <th>البيان</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($receipt_students as $receipt_student)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$receipt_student->student->name}}</td>
                                            <td>{{ number_format($receipt_student->Debit, 2) }}</td>
                                            <td>{{$receipt_student->description}}</td>
                                                <td>
                <a href="{{route('receipt.edit',$receipt_student->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                </td>
                                            </tr>
                                       
                                        @endforeach
                                    </table>
                                    {{ $receipt_students->links() }}          
                                    </div>
                                </div>



















</div>





</div>







</div>





 @include('footer')