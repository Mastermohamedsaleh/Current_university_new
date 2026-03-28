@include('header')
<div class="wrapper">
    @include('sidebar_student')
    
    <div class="main">
        @include('nav')
        
        @yield('content')

@section('content')
<div class="main">
    <h3 class="txt-green text-center">Quizzes</h3>

    {{-- رسائل الخطأ والنجاح --}}
    @if ($errors->any() || Session::has('message'))
        <div class="alert {{ $errors->any() ? 'alert-danger' : 'alert-info' }} mx-auto" style="width:300px;">
            {{ Session::get('message') }}
            @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
        </div>
    @endif

    <div class="container mt-3">
        <div class="table-responsive">
            <table id="datatable" class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Quiz Name</th>
                        <th>Course</th>
                        <th>Doctor</th>
                        <th>Time</th>
                        <th>Processes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quizzes as $quizze)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $quizze->name }}</td>
                        <td>{{ $quizze->Course->name }}</td>
                        <td>{{ $quizze->doctor->name }}</td>
                        <td>
                            {{ \Carbon\Carbon::parse($quizze->start_time)->format('l h:i A') }}
                        </td>
                        <td>
                            @php
                                $currentTime = \Carbon\Carbon::now('Africa/Cairo');
                                $hasStarted = $currentTime >= $quizze->start_time;
                                $hasEnded = $currentTime > $quizze->end_time;
                                $questionsCount = $quizze->questions->count(); 
                                $isSpecial = $quizze->specialQuizzes()->where('student_id', auth()->id())->exists();
                                $degree = $quizze->degree()->where('student_id', auth()->id())->first();
                            @endphp

                            @if(!$hasStarted)
                                <span class="badge bg-warning">Not Started Yet</span>
                            @elseif($questionsCount == 0)
                                <span class="text-muted">No Questions Yet</span>
                            @elseif($isSpecial)
                                <span class="badge bg-info">Special Quiz</span>
                            @elseif($degree)
                                <a href="{{ url('Detailsquizanddedegree', $quizze->id) }}" class="btn btn-outline-success btn-sm">
                                    View Degree <i class="fa-solid fa-graduation-cap"></i>
                                </a>
                            @elseif($hasEnded)
                                <span class="badge bg-danger">Quiz Ended</span>
                            @else
                                <a href="{{ route('student_quiz.show', $quizze->id) }}" 
                                   class="btn btn-outline-success btn-sm"
                                   onclick="{{ $quizze->type_quiz == 1 ? 'alertAbuse()' : '' }}">
                                    Enter Quiz <i class="fas fa-person-booth"></i>
                                </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function alertAbuse() {
        alert("برجاء عدم إعادة تحميل الصفحة بعد دخول الاختبار - في حال تم تنفيذ ذلك سيتم الغاء الاختبار بشكل اوتوماتيك ");
    }
</script>
@include('footer')