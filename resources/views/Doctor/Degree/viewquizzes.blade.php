@include('header')
  <div class="wrapper">
    @include('sidebar_doctor')

      <div class="main">
 @include('nav')



 <div class="contanier">

  

 
   
    <div class="card">
 

     <div class="card-body">




     <div class="table-responsive">
                                    <table  class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <td>Quizze</td>
                                            <th>Score</th>
                                           
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($quizzes as $quizze)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{$quizze->quizze->name}}</td>
                                                <td>{{$quizze->score}}</td>
                                             

@endforeach
   

</table>




 <h3 class="text-center">Sum : {{$score}}</h3>
 


  
 



     </div>


    </div>
  
 



 </div>









 @include('footer')
