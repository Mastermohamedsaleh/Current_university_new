
<!-- Modal -->
<div class="modal fade" id="editsection{{$section->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Section</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form method="post"  action="{{route('sections.update',$section->id)}}" autocomplete="off" >
      @method('PUT')
      @csrf

      <div class="row">
      <div class="col-6">
      <div class="form-group">
        <label>Name: </label>
        <input type="text"  value="{{$section->name}}" name="name"  >
        </div>
      </div>

     

      <div class="col-6">
      <label>College: </label>
               <select  name="college_id" >
               <option value="" disable>Choose College</option>
                       @foreach($colleges as $college) 
             
                       <option value="{{$college->id}}" {{ $college->id == $section->college_id_id ? 'selected' : '' }} >{{$college->name}}</option>
                       @endforeach
               </select>
      </div>




      <div class="col-12">
      <label>Classroom: </label>
               <select name="classroom_id" >
             

               </select>
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









        

              