@include('header')
  <div class="wrapper">
    @include('sidebar')

      <div class="main">
 @include('nav')

 @if(Session::has('message'))
<p class="alert alert-info" style="width:500px;   margin: 0 auto ">{{ Session::get('message') }}</p>
@endif


 <h3 class="text-center txt-green mt-3">Graduated Student</h3>


 
 <div class="container">

<div class="col-lg-5 col-md-5 col-sm-12">

<form action="{{url('graduated_student')}}" method="get">
<div class="search-container">  
<input type="text" name="search" placeholder="Search Name OR Email">
  <button class="search-button"><i class="fa-solid fa-magnifying-glass"></i></button>
</div>
</form>
</div>

 <div class="container">



 


 <div class="card">


 <div class="card-body">





 <div class="table-responsive">
                        <table   class="table key-buttons text-md-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>email</th>
                                <th>College</th>
                                <th>Processes</th>
                            </tr>
                            </thead>
                            <tbody>
                 
                            
                

                            @forelse($students as  $student)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->college->name }}</td>
                                    <td>
                              


               

<button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#Return_Student{{ $student->id }}" >Return Student</button>
<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Delete_Student{{ $student->id }}" > Delete Student</button>

@include('Admin.graduated.Delete_Student')
@include('Admin.graduated.Return_Student')


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


 </div>

 </div>









@include('footer')
   









