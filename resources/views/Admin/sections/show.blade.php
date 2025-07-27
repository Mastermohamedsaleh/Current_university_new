@include('header')
  <div class="wrapper">
    @include('sidebar')

      <div class="main">
     @include('nav')





<div class="container">












 <h3 class="txt-green text-center">Sections</h3>
         


 <!-- Message Success -->
 @if(Session::has('message'))
<p class="alert alert-info" style="width:500px;   margin: 0 auto ">{{ Session::get('message') }}</p>
@endif
<!-- End Success -->

 <!-- Message Error -->
@if ($errors->any())
                    <div class="alert alert-danger" style="width:500px;   margin: 0 auto ">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
@endif
 <!-- End Message Error --> 


 <div class="card">

<div class="card-body">

<div class="table-responsive">

<table id="datatable"  class="table table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">





<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Classroom</th>
      <th scope="col">College</th>
      <th scope="col">Process</th>
    </tr>
  </thead>
  <tbody>
    <?php  $i = 1;  ?>
    @foreach($sections as $section)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$section->name}}</td>
      <td>{{$section->classroom->name}}</td>
      <td>{{$section->college->name}}</td>

     
      <td>

<button type="button" class="btn btn-sm btn-danger inline-block" data-bs-toggle="modal" data-bs-target="#deletesection{{$section->id}}">
<i class="fas fa-trash"></i>
</button>
                

 <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editsection{{$section->id}}">
 <i class="fas fa-edit"></i>
</button><br><br>
@include('Admin.sections.edit')
@include('Admin.sections.delete')


      </td>
    </tr>
@endforeach
  </tbody>



</table>
     


</div>
</div>
</div>
      
<!-- end container -->
</div>



 


@include('footer')