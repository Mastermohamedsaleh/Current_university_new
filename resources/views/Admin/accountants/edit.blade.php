
<!-- Modal -->
<div class="modal fade" id="editaccountant{{$accountant->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit accountant</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form method="post"  action="{{route('accountant.update',$accountant->id)}}" autocomplete="off" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
      <div class="col-12">
      <div class="form-group">
        <label>Name: </label>
        <input type="text"  value="{{$accountant->name}}" name="name"  >
        </div>
      </div>

  
      <div class="col-12">
      <div class="form-group">
         <label>Email : </label>
         <input type="email" value="{{$accountant->email}}"  name="email"  >
         </div>
      </div>

      <div class="col-12">
      <div class="form-group">
         <label>Ssn : </label>
         <input type="text" value="{{$accountant->ssn}}"  name="ssn"  >
         </div>
      </div>


      
      <div class="col-12">
      <label>College : </label>
      <select name="college_id" id="">
        @foreach($colleges as $college )
        <option value="{{$college->id}}">{{$college->name}}</option>
        @endforeach
</select>
      </div>

      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary button-mode" data-bs-dismiss="modal">Close</button>
        <button  class="btn bg-color2 button-mode">udpate</button>
</form>
      </div>
    </div>
  </div>
</div>







        

              