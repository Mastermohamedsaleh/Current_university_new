  
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
                    Student elements
                </li>


                <li class="sidebar-item">
                    <a href="{{url('dashboard/student')}}" class="sidebar-link"><i class="fa-solid fa-list" style="padding: 0 10px 0  0"></i>Dashboard</a>
                </li>

                <li class="sidebar-item">
                    <a href="{{route('lecturestudentcourse')}}" class="sidebar-link"><i class="fa-solid fa-book" style="padding: 0 10px 0  0"></i> Mylecture</a>
                </li>


                <li class="sidebar-item">
                    <a href="{{URL('fee_student')}}" class="sidebar-link"><i class="fa-solid fa-comments-dollar"  style="padding: 0 10px 0  0"></i>My Fee</a>
                </li>
   


              <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#auth" data-bs-toggle="collapse" area-expanded="false"></i></i><i class="fa-regular fa-file-lines" style="padding: 0 10px 0  0" ></i> Quiz <i class="fa-solid fa-chevron-down float-end"></i>  </a> 
                <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="{{route('student_quiz.index')}}" class="sidebar-link">All Quiz</a>
                        <a href="{{route('special_quiz')}}" class="sidebar-link">Speical Quiz</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                    <a href="{{URL('view_assignment')}}" class="sidebar-link"> <i class="fa-solid fa-book-open-reader" style="padding: 0 10px 0  0"></i>My Assignment</a>
             </li>
 
              <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#Schedule" data-bs-toggle="collapse" area-expanded="false"><i style="padding: 0 10px 0  0" class="fa-solid fa-clipboard-user"></i> My Schedule <i class="fa-solid fa-chevron-down float-end"></i> </a> 
                <ul id="Schedule" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="{{URL('showexamschedule')}}" class="sidebar-link">Exam Schedule</a>
                        <a href="{{URL('showstudychedule')}}" class="sidebar-link">Studey Schedule</a>
                    
                    </li>
                </ul>
            </li>


            
            <li class="sidebar-item">
                    <a href="{{URL('student_online')}}" class="sidebar-link"><i style="padding: 0 10px 0  0" class="fa-solid fa-globe"></i>Online Course</a>
                </li>

            <li class="sidebar-item">
                    <a href="{{URL('studentprofile')}}" class="sidebar-link"><i style="padding: 0 10px 0  0" class="fa-solid fa-user"></i>MyProfile</a>
                </li>
            
            </ul>
        </div>    
    </aside>