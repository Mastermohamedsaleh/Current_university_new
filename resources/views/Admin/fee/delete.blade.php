<!-- Modal -->
<div class="modal fade" id="Delete_Fee{{$f->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel"> Deleted_Fee </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form method="post"  action="{{route('fee.destroy',$f->id)}}" autocomplete="off" >
      @csrf
    @method('DELETE')






   
    <h5 style="font-family: 'Cairo', sans-serif;">Are you Sure from delete Fee</h5>

      

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary button-mode" data-bs-dismiss="modal">Close</button>
        <button  class="btn btn-danger button-mode">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>







        

              
