<!-- Modal -->
<div class="modal fade" id="deletereceipt{{$receipt_student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel"> Deleted Receipt </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form method="post"  action="{{route('receipt.destroy',$receipt_student->id)}}" autocomplete="off" >
      @csrf
    @method('DELETE')






    <h5 style="font-family: 'Cairo', sans-serif;">Are you Sure from delete Receipt</h5>

      

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button  class="btn btn-danger">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>







        

              
