@include('header')
  <div class="wrapper">
    @include('sidebar')

      <div class="main">
 @include('nav')




<h3 class="txt-green text-center">Admins</h3>




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




 <div class="card">

 <div class="card-body">
       



 <button type="button" class="btn bg-color2 btn-sm" data-bs-toggle="modal" data-bs-target="#admin">
 Add New Admin
</button><br><br>
      @include('Admin.admins.add')
 

 <div class="table-responsive">
                        <table id="datatable"  class="table key-buttons text-md-nowrap">
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
                                    <?php $i= 1  ?>
                            @foreach($admins as  $admin)
                                <tr>
                                    <td> {{$i++}} </td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->college->name }}</td>
                                    <td>
                              

<button type="button" class="btn btn-sm btn-danger inline-block" data-bs-toggle="modal" data-bs-target="#deleteadmin{{$admin->id}}">
<i class="fas fa-trash"></i>
</button>
                

 <button type="button" class="btn bg-color2 btn-sm" data-bs-toggle="modal" data-bs-target="#editadmin{{$admin->id}}">
 <i class="fas fa-edit"></i>
</button><br><br>

@include('Admin.admins.edit')

@include('Admin.admins.delete')

                                    </td>

                                        </div>

                                    </td>
                                </tr>
@endforeach

 </div>




 </div>


 <!-- end container -->
 </div>
    

 @include('footer')
