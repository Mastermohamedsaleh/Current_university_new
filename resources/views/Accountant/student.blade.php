@include('header')
  <div class="wrapper">
    @include('sidebar_accountant')

      <div class="main">
 @include('nav')




<h3 class="txt-green text-center">students</h3>



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








 <div class="container mt-3">
 <div class="col-lg-5 col-md-5 col-sm-12">

<form action="{{url('studentswithaccount')}}" method="get">
<div class="search-container">  
<input type="text" name="search" placeholder="Search Name OR Email">
  <button class="search-button"><i class="fa-solid fa-magnifying-glass"></i></button>
</div>
</form>
</div>




 <div class="card">

 <div class="card-body">
       

 <div class="table-responsive">
                        <table  class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>email</th>
                                <th>College</th>
                                <th>Classroom</th>
                                <th>Section</th>
                                <th>Processes</th>
                            </tr>
                            </thead>
                            <tbody>
                                    <?php $i= 1  ?>
                                    @forelse($students as  $student)
                                <tr>
                                    <td> {{$i++}} </td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->college->name }}</td>
                                    <td>{{ $student->classroom->name }}</td>
                                    <td>{{  (  $student->section_id  ?  $student->section->name   : 'No Section' ) }}</td>
                                    <td>
                              




                                    <!-- Example single danger button -->













    <li><a class="dropdown-item" href="{{route('fee_invoices.show',$student->id)}}"> <i class="fa-solid fa-sack-dollar"></i> Add Fee</a></li>
    <li><a class="dropdown-item" href="{{route('receipt.show',$student->id)}}" > <i class="fa-solid fa-hand-holding-dollar"></i> Receipt</a></li>
  



</div>






                                    </td>

                                        </div>

                                    </td>
                                </tr>

                      </table>
                      
                      @empty

<h1 class="text-center text-danger">No Student</h1>


@endforelse
 {{ $students->links() }}

 </div>



 </div>









 <!-- end container -->
 </div>
    

 @include('footer')
