








<!-- Modal -->
<div class="modal fade" id="Return_Student{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel"> Return Student </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form method="post"  action="{{route('graduated.update',$student->id)}}" autocomplete="off" >
      @method('PUT')
      @csrf






<h5 style="font-family: 'Cairo', sans-serif;"> Are You Sure from Return ? </h5>
                    <input type="text" readonly value="{{$student->name}}">

      

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary button-mode" data-bs-dismiss="modal">Close</button>
        <button  class="btn btn-success button-mode">Udpate</button>
      </div>
      </form>
    </div>
  </div>
</div>







        

              
