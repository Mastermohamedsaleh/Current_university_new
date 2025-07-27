@include('header')
  <div class="wrapper">
  @include('sidebar_student')

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
   
        </tr>
                                        @endforeach
                                    </table>





</div>



@include('footer')