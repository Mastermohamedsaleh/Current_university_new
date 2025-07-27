








<!-- Modal -->
<div class="modal fade" id="classroom" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ِAdd Classroom</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         



        <form action="{{route('classrooms.store')}}" method="post">

        @csrf
        
      <div class="create" id="create"></div>
       
       <a href="javascript:void(0)" class="btn bg-color2 btn-sm addrow" id="addrow">+</a>



        
       

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary button-mode" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn bg-color2 button-mode">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>


<script>
$(document).ready(function(){
  $(".addrow").click(function(){
    var row = `
    <div class="row mt-2">
    <div class="col-5">
    <input type="text" name="name[]" >
    </div>
    <div class="col-5">
    <select name="college_id[]" id="">
    <option value="" disabled>Choose College</option>
@foreach($colleges as $college)
  <option value="{{$college->id}}">{{$college->name}}</option>
@endforeach
</select>

    </div>
    <div class="col-2">
    <a hreg="javascript:void(0)" class="btn btn-danger btn-sm deleteRow" >-</a>
    </div>
    </div>
      `
     $('.create').append(row);

     $(".deleteRow").click(function(){

      $(this).parent().parent().remove();
           
     });


  });
});
</script>


