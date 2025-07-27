
<!-- Modal -->
<div class="modal fade" id="editschedule{{$schedule->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Schedule</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form method="post"  action="{{route('examsschedule.update',$schedule->id)}}" autocomplete="off" >
      @method('PUT')
      @csrf

      


      <div class="row">




      <div class="col">
           
 <label>Exam_date: <span class="text-danger">*</span> </label>
    <input type="date" name="exam_date"  value="{{$schedule->exam_date}}">
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







        

              