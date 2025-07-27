
<!-- Modal -->
<div class="modal fade" id="Delete_all" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Return Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form method="post"  action="{{route('promotion.destroy','test')}}" autocomplete="off" >
       @method('DELETE')
       @csrf

  <input type="hidden" name="page_id" value="1">
      
                        <div class="col">
                            <p class="h5 text-danger"> Do You Want Return All Student ?</p>
                        </div>
                

      

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary button-mode" data-bs-dismiss="modal">Close</button>
        <button  class="btn btn-danger button-mode">Return</button>
      </div>
</form>
    </div>
  </div>
</div>







        

              