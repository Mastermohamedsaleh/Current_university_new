
<!-- Modal -->
<div class="modal fade" id="section" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Sections</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form method="post"  action="{{route('sections.store')}}" autocomplete="off" >
      @csrf
      <div class="row">
      <div class="col">
      <div class="form-group">
        <label>Name: </label>
        <input type="text"  name="name"  >
        </div>
      </div>


      <div class="col-12 mt-3">
      <div class="form-group">
         <label>College : </label>
                   <select name="college_id" >    
                     <option value="" disable>Chooces College</option>
                        @foreach($colleges as $college)
                              <option value="{{$college->id}}">{{$college->name}}</option>
                        @endforeach
                   </select>
         </div>
      </div>

      <div class="col-12 mt-3">
      <div class="form-group">
         <label> Classroom : </label>
                <select name="classroom_id"  >

                </select>
         </div>
      </div>



  


      </div>

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

$(document).ready(function () {

    $('select[name="college_id"]').on('change', function () {
      
        var college_id = $(this).val();

        if(college_id){
            $.ajax({
                url: "{{ URL::to('classes') }}/"+college_id,
                type: "GET",
                dataType: "json",

              success: function(data) {
                 $('select[name="classroom_id"]').empty();
                 $.each(data, function (key, value) { 
                    $('select[name="classroom_id"]').append('<option value="' + key + '">' + value + '</option>')   
                 });
              },
            });

        }else {
            console.log('AJAX load did not work');
            }


    });
});



</script>




        

              