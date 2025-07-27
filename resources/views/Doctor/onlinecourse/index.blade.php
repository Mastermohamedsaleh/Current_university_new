@include('header')
  <div class="wrapper">
  @include('sidebar_doctor')

      <div class="main">
@include('nav')



<div class="container mt-2">

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

<a href="{{route('onlinecourse.create')}}" class="btn  btn-sm bg-color2" role="button"
                                   aria-pressed="true"> Add New Lecuter </a>
<a href="{{route('onlinecoursedirect.create')}}" class="btn  btn-sm bg-color2" role="button"
                                   aria-pressed="true"> Add New Direct Lecuter </a><br><br>


<div class="card">

<div class="card-body">





<table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
       style="text-align: center">
    <thead>
    <tr class="alert-success">
        <th>#</th>
        <th>College</th>
        <th>Classroom</th>
        <th>Section</th>
        <th>Doctor</th>
        <th>Title Lecuter</th>
        <th> Date</th>
        <th> Time Lecuter</th>
        <th> Link </th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($onlinecourse as $c)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $c->college->name}}</td>
            <td>{{ $c->classroom->name }}</td>
            <td>{{ ( $c->section_id  ? $c->section->name : 'No Section' ) }}</td>
            <td>{{$c->doctor->name}}</td>
            <td>{{$c->topic}}</td>
            <td>{{$c->start_at}}</td>
            <td>{{$c->duration}}</td>
            <td class="text-danger"><a href="{{$c->join_url}}" target="_blank"> Join Now</a></td>
            <td>

<button type="button"
 class="mb-2 btn btn-outline-danger btn-sm" 
 data-bs-toggle="modal"
  data-bs-target="#Delete{{$c->id}}">
  <i class="fas fa-trash"></i>
</button>
@include('Doctor.onlinecourse.delete')

            </td>
        </tr>
                                        @endforeach
                                    </table>



                                    </div>


</div>

</div>



@include('footer')