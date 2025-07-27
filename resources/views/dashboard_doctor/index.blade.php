
  
  
  
     @include('header')
  <div class="wrapper">
    @include('sidebar_doctor')



      <div class="main">
 @include('nav')

        <!-- main -->



<div class="container mt-3">

        <div class="row">

        <div class="col-lg-6">
        <div class="card card-margin">

            <div class="card-header no-border">
                <h5 class="card-title">Lecture</h5>
            </div>

            <div class="card-body pt-0">

                <div class="widget-49">
                    <div class="widget-49-title-wrapper">
                        
                        <div class="widget-49-date-success">
                            <span class="widget-49-date-day">{{\App\Models\Lecture::where('doctor_id',auth()->user()->id)->count()}}</span>
                         
                        </div>

                        <div class="widget-49-meeting-info">
                            <span class="widget-49-pro-title"></span>
                   
                        </div>
                    </div>
                

                    <div class="widget-49-meeting-action">
                        <a href="{{route('lecture.index')}}" class="btn btn-sm btn-flash-border-primary">View All</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="col-lg-6">
        <div class="card card-margin">

            <div class="card-header no-border">
                <h5 class="card-title">Quiz</h5>
            </div>

            <div class="card-body pt-0">

                <div class="widget-49">
                    <div class="widget-49-title-wrapper">
                        
                        <div class="widget-49-date-success">
                            <span class="widget-49-date-day">{{\App\Models\Quizze::where('doctor_id',auth()->user()->id)->count()}}</span>
                 
                        </div>

                        <div class="widget-49-meeting-info">
                            <span class="widget-49-pro-title"></span>
                           
                        </div>
                    </div>
                

                    <div class="widget-49-meeting-action">
                        <a href="{{route('quizzes.index')}}" class="btn btn-sm btn-flash-border-primary">View All</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
       

</div>



</div>


          
      </div>
    </div>
 @include('footer')
