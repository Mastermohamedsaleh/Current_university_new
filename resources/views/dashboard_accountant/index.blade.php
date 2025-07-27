  
     @include('header')
  <div class="wrapper">
    @include('sidebar_accountant')



      <div class="main">
 @include('nav')




 


 <div class="container">



<div class="row mt-5">






<div class="col-lg-6">
        <div class="card card-margin">

            <div class="card-header no-border">
                <h5 class="card-title">Student</h5>
            </div>

            <div class="card-body pt-0">

                <div class="widget-49">
                    <div class="widget-49-title-wrapper">
                    <div class="widget-49-date-success">
                            <span class="widget-49-date-day">{{\App\Models\Student::where('college_id',auth()->user()->college_id)->count()}}</span>
                         
                        </div>

                        <div class="widget-49-meeting-info">
                            <span class="widget-49-pro-title"></span>
                   
                        </div>
                    </div>
                

                    <div class="widget-49-meeting-action">
                        <a href="{{url('studentswithaccount')}}" class="btn btn-sm btn-flash-border-primary">View All</a>
                    </div>
                </div>
            </div>
        </div>
    </div>








</div>







 </div>





 @include('footer')