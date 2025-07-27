
<!-- Modal -->
<div class="modal fade" id="editschedule{{$schedule->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Schedule</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form method="post"  action="{{route('studyschedule.update',$schedule->id)}}" autocomplete="off" >
      @method('PUT')
      @csrf

      


      <div class="row">




      <div class="col-12">
   <label>Course_Day: <span class="text-danger">*</span> </label>
    <select   name="course_day">
    <option value="sunday">Sunday</option>
    <option value="monday">Monday</option>
    <option value="tuesday">Tuesday</option>
    <option value="wednesday">Wednesday</option>
    <option value="thursday">Thursday</option>
    <option value="friday">Friday</option>
    <option value="saturday">Saturday</option>
</select>
</div>


      <div class="col">
    
      <label>Start_Time: <span class="text-danger">*</span> </label>
    <input type="time" name="start_time" value="{{$schedule->start_time}}" >

      </div>

<div class="col">

<label>End_Time: <span class="text-danger">*</span> </label>
<input type="time" name="end_time" value="{{$schedule->end_time}}" >

</div>



      </div>








      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary  button-mode" data-bs-dismiss="modal">Close</button>
        <button  class="btn btn-primary button-mode">Udpate</button>
      </div>
      </form>
    </div>
  </div>
</div>







        

              