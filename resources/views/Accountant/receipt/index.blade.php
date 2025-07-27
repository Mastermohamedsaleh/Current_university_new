@include('header')
  <div class="wrapper">
    @include('sidebar_accountant')

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






<div class="card">



<h4 class="txt-green text-center mt-3">Receipt</h4>

<div class="caed-body">


<div class="table-responsive">



<div class="container">

                                    <table  class="table  table-hover table-sm table-bordered p-0 "
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Amount</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($receipt_students as $receipt_student)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$receipt_student->student->name}}</td>
                                            <td>{{ number_format($receipt_student->Debit, 2) }}</td>
                                            <td>{{$receipt_student->description}}</td>
                                            <td>{{$receipt_student->date}}</td>
                                                <td>
                <a href="{{route('receipt.edit',$receipt_student->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
<button type="button" class="btn btn-danger btn-sm inline-block" data-bs-toggle="modal" data-bs-target="#deletereceipt{{$receipt_student->id}}">
<i class="fas fa-trash"></i>
</button>

<a href="{{route('receiptditalis',$receipt_student->student_id)}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true"><i class="fa-solid fa-download"></i></a>

                
@include('Accountant.receipt.delete')
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