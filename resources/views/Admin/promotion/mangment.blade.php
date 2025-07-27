@include('header')
  <div class="wrapper">
    @include('sidebar')

      <div class="main">
 @include('nav')


<h3 class="txt-green text-center mt-4">Mangment Promotion</h3>

<div class="container mt-5">







<div class="card">

<div class="card-body">


<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Delete_all">
       Return All
</button><br><br>

 <div class="table-responsive">
                                    <table id="datatable"
                                    class="table table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th >#</th>
                                            <th >Name</th>
                                            <th >From College</th>
                                            <th >academic_year</th>
                                            <th >From Classroom</th>
                                            <th >From Section</th>
                                            <th >To College</th>
                                            <th >academic_year_new  </th>
                                            <th >To Classroom</th>
                                            <th >To Section</th>
                                            <th>Processes</th>
                                        </tr>
                                        </thead>
                                     
                                        @foreach($promotions as $promotion)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{$promotion->student->name}}</td>
                                                <td>{{$promotion->f_college->name}}</td>
                                                <td>{{$promotion->academic_year}}</td>
                                                <td>{{$promotion->f_classroom->name}}</td>
                                                <td> {{  ( $promotion->from_section  ?   $promotion->f_section->name :'no Section'  ) }}</td>
                                                <td>{{$promotion->t_college->name}}</td>
                                                <td>{{$promotion->academic_year_new}}</td>
                                                <td>{{$promotion->t_classroom->name}}</td>
                                                <td>{{  ( $promotion->to_section ?    $promotion->t_section->name :'no Section'  ) }} </td>
                                                <td>

 <button type="button" class="btn btn-outline-danger d-inline btn-sm " data-bs-toggle="modal" data-bs-target="#Delete_one{{$promotion->id}}"> Return </button>
 


 @include('Admin.promotion.Delete_one')         
                                                </td>
                                            </tr>
                                
                                        @endforeach
                                    </table>



                                                    </div>
                                                    </div>



                                    </div>
</div>


@include('Admin.promotion.Delete_all')





 @include('footer')
