  
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
                    Accountant elements
                </li>


                <li class="sidebar-item">
                    <a href="" class="sidebar-link"><i class="fa-solid fa-list" style="padding: 0 10px 0  0"></i>Dashboard</a>
                </li>


                <li class="sidebar-item">
                    <a href="{{url('studentswithaccount')}}" class="sidebar-link"><i class="fa-solid fa-graduation-cap" style="padding: 0 10px 0  0"></i> Students </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{route('fee_invoices.index')}}" class="sidebar-link"> <i class="fa-solid fa-file-invoice-dollar" style="padding: 0 10px 0  0"></i> fee_invoices </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{route('receipt.index')}}" class="sidebar-link"><i class="fa-solid fa-comments-dollar" style="padding: 0 10px 0  0"></i> Receipt </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{url('accountantprofile')}}" class="sidebar-link"><i class="fa-solid fa-user" style="padding: 0 10px 0  0"></i> MyProfile </a>
                </li>

               
            
            </ul>
        </div>    
    </aside>