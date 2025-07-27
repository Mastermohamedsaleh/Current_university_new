@include('header')
  <div class="wrapper">
    @include('sidebar_accountant')

      <div class="main">
 @include('nav')







@if ($errors->any())
                    <div class="alert alert-danger"  style="width:500px;   margin: 0 auto ">
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








 <div class="container mt-3">


 <h3 class="txt-green text-center">Fee Invoices</h3>

 <div class="card">

 <div class="card-body">

       
 
 

 <div class="table-responsive">
                        <table   class="table key-buttons text-md-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>Fee</th>
                                <th>Amount</th>
                                <th>college</th>
                                <th>Classroom</th>
                                <th>Section</th>
                            </tr>
                            </thead>
                            <tbody>
                                    <?php $i= 1  ?>
                            @foreach($fee_invoices as  $fee_invoice)
                                <tr>
                                    <td> {{$i++}} </td>
                                    <td>{{ $fee_invoice->student->name }}</td>
                                    <td>{{ $fee_invoice->fee->title }}</td>
                                    <td>{{ $fee_invoice->fee->amount }}</td>
                                    <td>{{ $fee_invoice->college->name }}</td>
                                    <td>{{ $fee_invoice->classroom->name }}</td>
                                    <td> 
                                     <?php
                                     
                                     if($fee_invoice->section_id) {
                                     echo   $fee_invoice->section->name;
                                     }else{
                                        echo "No Section";
                                     }
                                     
                                     ?>
                                     
                                     
                                       
                                    </td>
         

                                        </div>

                                    </td>
            
            
                                </tr>

                             
@endforeach

 </div>


 {{ $fee_invoices->links() }}

 </div>










 <!-- end container -->
 </div>
    

 @include('footer')
