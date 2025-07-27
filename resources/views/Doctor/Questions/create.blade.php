@include('header')
  <div class="wrapper">
  @include('sidebar_doctor')

      <div class="main">
@include('nav')



<div class="container ">





@if ($errors->any())
                    <div class="alert alert-danger" style="width:300px; margin:0px auto">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif



                @if(Session::has('message'))
<p class="alert alert-info" style="width:300px; margin:0px auto">{{ Session::get('message') }}</p>
@endif

                @if(Session::has('error'))
<p class="alert alert-danger" style="width:300px; margin:0px auto">{{ Session::get('error') }}</p>
@endif

<form action="{{route('questions.store')}}" method="post" autocomplete="off">




@csrf



<div class="card">
    <div class="card-body">



<div class="row">



<legend><span class="number bg-color2"><i class="fa-solid fa-pen"></i></span> Write New Question</legend>


<div class="col">
    <label for="">Type Question</label>
    <select name="typequestion" id="">
        <option value="trueorfale">True OR False</option>
        <option value="choose">Choose</option>
    </select>
</div>



<div class="col-12">
<label for="title">Name Question </label>
    <input type="text" name="title" id="input-name"  value =" {{ old('title') }} " autofocus>
    <input type="hidden" value="{{$quizz->id}}" name="quizz_id">
</div>


 

<div class="col-12">
<label for="title">Answers => <span class="text-danger">You must separate each answer with a mark <span class="display-6"> [-] </span> Like True - False </span></label>
<textarea name="answers"  id="exampleFormControlTextarea1" rows="4">{{ old('answers') }} </textarea>
</div>




<div class="col-6">
      <label for="title"> Right Answer</label>
      <input type="text" name="right_answer" id="input-name"
      value =" {{ old('right_answer') }} "     autofocus>
</div>


<div class="col">
                                        <div class="form-group">
                                            <label >Degree : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="score" >
                                                <option selected disabled>  Choose Degree...</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="2.5">2.5</option>
                                                <option value="3">3</option>
                                                <option value="5">5</option>
                                                <option value="10">10</option>
                                                <option value="15">15</option>
                                                <option value="20">20</option>
                                            </select>
                                        </div>
                                    </div>









</div>



<button type="submit" class="btn bg-color2">Save</button>


</div>
</div>


</form>


</div>



@include('footer')
