@include('header')
  <div class="wrapper">
    @include('sidebar_student')

      <div class="main">
 @include('nav')








 <h4 class="txt-green text-center mt-3"> My Fee</h4>




 
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


<div class="container mt-2">




<div class="table-responsive">
                        <table   class="table table-hover key-buttons text-md-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>amount</th>
                                <th>College</th>
                                <th>Classroom</th>
                                <th>Section</th>
                                <th>Academic Year</th>
                                <th>Details</th>
                            
                            </tr>
</thead>
<tbody>                        
@foreach($fees as $f)
                           <tr>
                           <td>{{$loop->index+1}}</td>
                           <td>{{$f->title}}</td>
                            <td>{{$f->amount}}</td>
                            <td>{{$f->college->name}}</td>
                            <td>{{$f->classroom->name}}</td>
                            <td>{{ ($f->section_id  ? $f->section->name : 'no Section' ) }}</td>
                            <td>{{$f->academic_year}}</td>
                             <td> <a href="{{url('details_fee_student')}}" class="btn bg-color2 btn-sm">Details</a>  </td>
                           </tr>

                         @endforeach

                                </tbody>
</table>
</div>













<!-- end container -->
</div>






 @include('footer')
