


@include('header')
  <div class="wrapper">
    @include('sidebar_accountant')

      <div class="main">
 @include('nav')


<div class="mt-2">
 @if ($errors->any())
                    <div class="alert alert-danger" style="width:500px;   margin: 0 auto ">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                
    @if(Session::has('message'))
<p class="alert alert-info" style="width:500px;   margin: 0 auto ">{{ Session::get('message') }}</p>
@endif



<style>

input#file {
  display: inline-block;
  width: 100%;
  padding: 120px 0 0 0;
  height: 100px;
  overflow: hidden;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  background: url('https://cdn1.iconfinder.com/data/icons/hawcons/32/698394-icon-130-cloud-upload-512.png') center center no-repeat #e4e4e4;
  border-radius: 20px;
  background-size: 60px 60px;
}


</style>


@if(\Auth::guard('accountant')->user()->image_name == 'default.jpg')
  <?php   $image  = 'Assets/images/default.jpg'; ?>
    @else
    <?php   $image  = '/image/'.\Auth::guard('accountant')->user()->image_name; ?>          
    @endif

</div>



<div class="container">

 <!-- acount img -->
 <div
                            class="rounded-3 border border-2 mb-2"
                            style="
                              height: 100px;
                              width: 100px;
                              background-image: url({{$image}});
                              background-position: center;
                              background-size: cover;
                              border-color: #00d084 !important;
                            "
                          ></div>
                        

                     <div class="col d-flex flex-column justify-content-around">
                            
               
                <ul class="list-group list-group-horizontal w-100 rounded-0">
                  <li
                    class="list-group-item w-50 border-0 rounded-0 fw-bold fs-6 bg-light-green"
                  >
                  Name
                  </li>
                  <li
                    class="list-group-item w-50 border-0 rounded-0 fw-bold fs-6 txt-green bg-light-green"
                  >
                  {{\Auth::guard('accountant')->user()->name}}         
                  </li>
                </ul>
                <ul class="list-group list-group-horizontal w-100 rounded-0">
                  <li
                    class="list-group-item w-50 border-0 rounded-0 fw-bold fs-6"
                  >
                    Email
                  </li>
                  <li
                    class="list-group-item w-50 border-0 rounded-0 fw-bold fs-6 txt-green"
                  >
                  {{\Auth::guard('accountant')->user()->email}}
                  </li>
                </ul>
         


                <ul class="list-group list-group-horizontal w-100 rounded-0">
                  <li
                    class="list-group-item w-50 border-0 rounded-0 fw-bold fs-6  bg-light-green"
                  >
                   SSn
                  </li>
                  <li
                    class="list-group-item w-50 border-0 rounded-0 fw-bold fs-6 txt-green  bg-light-green"
                  >
                  {{\Auth::guard('accountant')->user()->ssn}}
                     
                  </li>
                </ul>



                <ul class="list-group list-group-horizontal w-100 rounded-0  bg-light-green">
                  <li
                    class="list-group-item w-50 border-0 rounded-0 fw-bold fs-6"
                  >
                    Choose File
                  </li>
                  <li
                    class="list-group-item w-50 border-0 rounded-0 fw-bold fs-6 txt-green"
                  >
                  <button type="button" class="btn  border-0 p-1 bg-green" style="height: 36px; width: 36px" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
<i class="fa-solid fa-pen-to-square"></i>
</button>
                  </li>
                </ul>
              </div>

              </div>





 <!-- Modal -->
 <div
                class="modal fade"
                id="staticBackdrop"
                data-bs-backdrop="static"
                data-bs-keyboard="false"
                tabindex="-1"
                aria-labelledby="staticBackdropLabel"
                aria-hidden="true"
              >
                <div
                  class="modal-dialog modal-fullscreen-sm-down"
                  style="min-width: 800px !important"
                >
                  <div class="modal-content">
                    <div class="modal-header">
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                      <div class="container">
                        <!-- photo upload and name -->
                        <form action="{{url('updateprofile',\Auth::guard('accountant')->user()->id)}}" method="post" enctype="multipart/form-data">
                          <!-- acount img -->
                          @csrf
                        <div class="row mx-auto d-flex flex-row">
                       
                          <input
                            class="rounded-3 border border-2"
                            style="
                              height: 100px;
                              width: 100px;
                              background-image: url({{$image}});
                              background-position: center;
                              background-size: cover;
                              border-color: #00d084 !important;
                             
                            "
                            id="file"
                            name="image"
                            type="file"
                          >
                          <!-- image upload buttons + name -->
                          <div
                            class="col d-flex flex-column justify-content-around"
                          >
                            <span class="fw-semibold fs-6">{{\Auth::guard('accountant')->user()->name}}</span>
                            <span class="txt-green">{{\Auth::guard('accountant')->user()->college->name}}</span>
                            <div class="w-auto">
                              <input type="hidden" name="email" value="{{\Auth::guard('accountant')->user()->email}}" >
                              <input type="hidden" name="name" value="{{\Auth::guard('accountant')->user()->name}}" >
                              <button
                              name="action"
                                type="submit"
                                class="w-auto btn bg-color2 custom-success-button"
                                value="upload"
                              >
                                Upload Photo
                              </button>
                              <button
                               name="action"
                                class="w-auto btn btn-danger"
                                style="
                                  height: 38px;
                                  width: 38px;
                                  background-color: red;
                                "
                                value="delete"
                              >
                              <i class="fa-regular fa-trash-can"></i>
                              </button>
                            </div>

                          </div>
                        </div>
                        </form>
                        <!-- account data form -->
                        <form class="mt-3 "  action="{{ route('update-password') }}"  method="post"  > 
                          @csrf
                          <div class="mb-3">
                            <label  class="form-label"
                              >Old Password</label
                            >
                         
                            <input
                              type="password"
                              class="form-control custom-input-border-color"
                            
                              name="old_password"
                            />
                          </div>
                          <div class="mb-3">
                            <label  class="form-label"
                              >New Password</label
                            >
                            <input
                              type="password"
                              class="form-control custom-input-border-color"
                            
                              name="new_password"
                            />
                          </div>
                          <div class="mb-3">
                            <label  class="form-label"
                              >Confirm Password</label
                            >
                            <input
                            
                              class="form-control custom-input-border-color"
                              name="new_password_confirmation" type="password"
                            />
                          </div>
                          
                      
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button
                        type="button"
                        class="btn btn-danger"
                        data-bs-dismiss="modal"
                      >
                        Close
                      </button>
                      <button
                        type="submit"
                        class="btn bg-color2 custom-success-button"
                      >
                        Change Password
                      </button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>







            <!-- #cheangePass{{\Auth::guard('accountant')->user()->id}} -->

            <!-- editprofileaccountant{{\Auth::guard('accountant')->user()->id}} -->


            <!-- {{url('updateprofile',\Auth::guard('accountant')->user()->id)}} -->
            <!-- {{ route('update-password') }} -->
            <!-- {{ route('update-password') }} -->





        

              



@include('footer')