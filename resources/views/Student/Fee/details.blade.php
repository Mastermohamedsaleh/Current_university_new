@include('header')
  <div class="wrapper">
    @include('sidebar_student')

      <div class="main">
 @include('nav')




 <div class="container mt-5">
 
  <h3 class="text-center txt-green">All Details</h3>




  <table class="table">

      <tr>
        <th>Date</th>
        <th>Debit</th>
        <th>credit</th>
      </tr>
      @foreach($studentAccounts as $studentAccount)
            
       
      <tr>
        <td>{{$studentAccount->date}}</td>
        <td>{{$studentAccount->Debit}}</td>
        <td>{{$studentAccount->credit}}</td>
      </tr>
      @endforeach
       <tr><td><h4> Total :</h4> </td><td>{{$total}}</td><td></td></tr>
  </table>
 







</div>






 @include('footer')