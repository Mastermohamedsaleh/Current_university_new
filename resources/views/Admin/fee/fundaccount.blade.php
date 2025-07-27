@include('header')
  <div class="wrapper">
    @include('sidebar')

      <div class="main">
 @include('nav')
 



   <div class="container">

  
  
    <form action="fund_account_search" method="get">
    <div class="card">


     <div class="card-body">
 
      

      <div class="row">


       
      <h3 class="txt-green">FundAccount</h3>
      <div class="col">
         <label for="">Form :</label>
      <input type="date" name="from">

      </div>




      <div class="col">
      <label for="">To :</label>
      <input type="date" name="to">

      </div>



      </div>

      







      <button type="search" class="btn btn-sm bg-color2">search</button>


      @isset($fundaccount) 
  
     <h4 class="text-center">{{$fundaccount}}</h4>   
       
      @endisset



     </div>

    </div>

    </form>



  </div>
 
 
   
 @include('footer')
