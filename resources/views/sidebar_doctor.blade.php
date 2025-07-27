  
      <aside id="sidebar" class="js-sidebar"><!-- side bar content-->
        <div class="h-100">
            <div class="sidebar-logo">
            <a class="navbar-brand ms-4" href="#"
          ><img
            src="{{ URL::asset('Assets/images/logo2.png') }}" 
            alt="Smart Academy logo"
            class="w-75 h-75"
        /></a>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Doctor elements
                </li>


                <li class="sidebar-item">
                    <a href="{{url('dashboard/doctor')}}" class="sidebar-link"><i class="fa-solid fa-list" style="padding: 0 10px 0  0"></i> Dashboard</a>
                </li>


                <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed coll" data-bs-target="#auth" data-bs-toggle="collapse" area-expanded="false"><i class="fa-solid fa-book" style="padding: 0 10px 0  0"></i> Mylecture <i class="fa-solid fa-chevron-down float-end"></i></a>
                <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="{{url('lecturedoctorcourse')}}" class="sidebar-link">lecture</a>
                        <a href="{{route('lecture.create')}}" class="sidebar-link">Add lecture</a>
                    </li>
                </ul>
            </li>



                <li class="sidebar-item">
                    <a href="{{URL('my_class')}}" class="sidebar-link"><i class="fa-solid fa-landmark" style="padding: 0 10px 0  0"></i> MyClass</a>
                </li>
       
               
              <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed coll" data-bs-target="#quiz" data-bs-toggle="collapse" area-expanded="false"></i><i class="fa-regular fa-file-lines" style="padding: 0 10px 0  0" ></i> Quiz <i class="fa-solid fa-chevron-down float-end"></i></a>
                <ul id="quiz" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="{{route('quizzes.index')}}" class="sidebar-link">Quiz</a>
                        <a href="{{route('quizzes.create')}}" class="sidebar-link">Add Quiz</a>
                        <a href="{{route('total_degree')}}" class="sidebar-link">Total Degree Quiz</a>
                    </li>
                </ul>
            </li>

              <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed coll" data-bs-target="#Assignment" data-bs-toggle="collapse" area-expanded="false"></i><i class="fa-solid fa-pen" style="padding: 0 10px 0  0"></i> Assignment <i class="fa-solid fa-chevron-down float-end"></i></a>
                <ul id="Assignment" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="{{route('assignments.index')}}" class="sidebar-link">Assignment</a>
                        <a href="{{route('assignments.create')}}" class="sidebar-link">Add Assignment</a>
                        <a href="{{url('studentassignment')}}" class="sidebar-link">Assignment Student</a>
                    </li>
                </ul>
            </li>

          
 
       

           

            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed coll" data-bs-target="#attendance" data-bs-toggle="collapse" area-expanded="false"></i> <i class="fa-solid fa-file-pen" style="padding: 0 10px 0  0"></i>  Attendance <i class="fa-solid fa-chevron-down float-end"></i></a>
                <ul id="attendance" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="{{route('attendance.index')}}" class="sidebar-link">Attendance</a>
                        <a href="{{url('attendance_report')}}" class="sidebar-link">Attendance Report</a>
                    </li>
                </ul>
            </li>



              <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed coll" data-bs-target="#onlinecourse" data-bs-toggle="collapse" area-expanded="false"></i><i style="padding: 0 10px 0  0" class="fa-solid fa-globe"></i> Online Course <i class="fa-solid fa-chevron-down float-end"></i></a>
                <ul id="onlinecourse" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="{{route('onlinecourse.index')}}" class="sidebar-link">OnlineCourse</a>
                        <a href="{{route('onlinecoursedirect.create')}}" class="sidebar-link">Add OnlineCourse</a>
                    </li>
                </ul>
            </li>
  


            <li class="sidebar-item">
                    <a href="{{URL('doctorprofile')}}" class="sidebar-link"><i style="padding: 0 10px 0  0" class="fa-solid fa-user" style="padding: 0 10px 0  0"></i>MyProfile</a>
                </li>



            </ul>
        </div>    
    </aside>