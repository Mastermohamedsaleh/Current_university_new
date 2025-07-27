@include('header')
  <div class="wrapper">
  @include('sidebar_student')

      <div class="main">
@include('nav')






<h3 class="txt-green text-center">assignment</h3>



@if ($errors->any())
                    <div class="alert alert-danger" style="width:300px; margin:0px auto">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif



                @if(Session::has('message'))
<p class="alert alert-info" style="width:300px; margin:0px auto">{{ Session::get('message') }}</p>
@endif
        @if(Session::has('danger'))
<p class="alert alert-danger" style="width:300px; margin:0px auto">{{ Session::get('danger') }}</p>
@endif














<div class="container mt-3">
























<div class="table-responsive">
                        <table id="datatable"  class="table table-hover table-bordered">


                        <thead>
                        <tr>
                                <th>#</th>
                                <th>Name assignment</th>
                                <th>Name Course</th>
                                <th>Name Doctor</th>
                                <th>Processes</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i= 1  ?>
             @foreach($assignments as $assignment)
                            <tr>
                            <td> {{$i++}} </td>
                      <td>{{$assignment->name}}</td>
                      <td>{{$assignment->Course->name}}</td>
                      <td>{{$assignment->doctor->name}}</td>


                      <td>

   



                        <a href="{{url('show_assignment',$assignment->id)}}"
                                class="btn btn-outline-success btn-sm" role="button"
                                aria-pressed="true" >
                                <i class="fas fa-person-booth"></i></a>
  

              </td>

                    </tr>
               @endforeach
               </tbody>

</table>

</div>

</div>








@include('footer')