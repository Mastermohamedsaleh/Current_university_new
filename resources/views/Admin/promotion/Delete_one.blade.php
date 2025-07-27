
<!-- Modal -->
<div class="modal fade" id="Delete_one{{$promotion->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Return Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form method="post"  action="{{route('promotion.destroy',$promotion->id)}}" autocomplete="off" >
       @method('DELETE')
      @csrf



      <h5 style="font-family: 'Cairo', sans-serif;">  Do You Want Return Student {{$promotion->student->name}} ?</h5>
            
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary button-mode" data-bs-dismiss="modal">Close</button>
        <button  class="btn btn-danger button-mode">Return</button>
      </div>
</form>
    </div>
  </div>
</div>







        

              











