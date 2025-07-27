


<!-- DAtatable -->
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.js"></script>
<!-- DAtatable -->



<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    } );


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
             $('select[name="classroom_id"]').append('<option selected  > Choose Classroom...</option>');
             $.each(data, function (key, value) { 
                $('select[name="classroom_id"]').append('<option value="' + key + '">' + value + '</option>')   
             });
          },
        });

    }else {
        console.log('AJAX load did not work');
        }
});


$('select[name="college_id"]').on('change', function () {

    var college_id = $(this).val();

    if(college_id){
        $.ajax({
            url: "{{ URL::to('getsection') }}/"+college_id,
            type: "GET",
            dataType: "json",

          success: function(data) {
             $('select[name="section_id"]').empty();
             $('select[name="section_id"]').append('<option selected disabled > Choose Section...</option>');   
             $.each(data, function (key, value) { 
                $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>')   
             });
          },
        });

    }else{
        console.log('AJAX load did not work');

    }

});  
});


</script>





</body>
</html>