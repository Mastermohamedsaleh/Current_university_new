<nav class="navbar navbar-expand px3 border-bottom">
          <button class="btn" id="sidebar-toggle" type="button">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="navbar-collapse navbar">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a href="#" data-bs-toggle="dropdown" class="navbar-icon pe-md-0">

    @if(auth('admin')->check())
      <?php  $name = \Auth::guard('admin')->user(); ?>
     @elseif(auth('doctor')->check())
   <?php  $name =  \Auth::guard('doctor')->user();
   ?>
     @elseif(auth('student')->check())
  <?php   $name = \Auth::guard('student')->user(); ?>
     @else
   <?php  $name = \Auth::guard('accountant')->user(); ?>
     @endif






    @if( $name->image_name == 'default.jpg')
    <img src="{{URL::asset('assets/images/default.jpg')}}" alt="SomeThing Wrong" class="img-fluid " style="width:60px; height:60px;   border-radius:50% ;"><h4 class="d-inline">{{$name->name}} <i class="fa-solid fa-caret-down"></i></h4>
    @else
    <img src="{{asset('/image/'.$name->image_name)}}" alt="" class="img-fluid " style="width:60px; height:60px;   border-radius:50% ;"><h4 class="d-inline">{{$name->name}} <i class="fa-solid fa-caret-down"></i></h4>         
    @endif


                 
                  <div class="dropdown-menu dropdown-menu-end">
   
                    <a href="#" class="dropdown-item">
      

 
                    
             @if(auth('web')->check())
									<form method="POST" action="{{ route('logout.user') }}">
									@elseif(auth('admin')->check())
									<form method="POST" action="{{ route('admin.logout') }}">
									@elseif(auth('student')->check())
									<form method="POST" action="{{ route('student.logout') }}">
									@elseif(auth('doctor')->check())
									<form method="POST" action="{{ route('doctor.logout') }}">
									@elseif(auth('accountant')->check())
									<form method="POST" action="{{ route('accountant.logout') }}">
									@endif
									@csrf
                                       <a    class="dropdown-item" href="#"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();"><i class="bx bx-log-out"></i>Sign Out</a> 
                                     
                                         </form> 












        
             </a>
                  </div>
                </a>
              </li>
            </ul>
          </div>
        </nav>