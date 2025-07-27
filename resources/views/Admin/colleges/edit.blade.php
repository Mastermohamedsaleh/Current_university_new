
<!-- Modal -->
<div class="modal fade" id="editcollege{{$college->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit College</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form method="post"  action="{{route('colleges.update',$college->id)}}" autocomplete="off" >
      @method('PUT')
      @csrf

      <div class="row">
      <div class="col-12">
     
        <label>Name : </label>
        <input type="text"  value="{{$college->name}}" name="name"  >

      </div>

     
      <div class="col-12">
      <label>Note : </label>
         <textarea name="note" id="" cols="30" rows="10">{{$college->note}}</textarea>
      </div>



      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary button-mode" data-bs-dismiss="modal">Close</button>
        <button  class="btn bg-color2 button-mode">Udpate</button>
      </div>
      </form>
    </div>
  </div>
</div>







        

              