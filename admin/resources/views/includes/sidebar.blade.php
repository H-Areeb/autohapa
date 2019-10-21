
@if(Auth::guard('admin')->check()) {{--admin auth--}}
    <div class="col-md-3">
        <div class="crs-sidebar">
            <ul class="cr-lst">
                <li><a href="{{route('admin.home')}}">Dashboard</a></li>
                <li><a href="{{route('courses.courses-listing')}}">Courses</a></li>
                <li><a href="{{route('all-programs')}}">All Programs</a></li>
                <li><a href="{{route('admin.user-quiz-submit-listing')}}">Submitted Quizzes</a></li>
                <li><a href="{{route('admin.student-listing')}}">Students</a></li>
                <li><a href="{{route('admin.reservation-listing')}}">Reservations</a></li>
                {{--<li><a href="{{route('admin.update-profile')}}">Update Profile</a></li>--}}
            </ul>
        </div>
    </div>

@elseif(Auth::check()) {{--user auth--}}
    <div class="col-md-3">
        <div class="crs-sidebar">
            <ul class="cr-lst">
                <li><a href="{{route('home')}}">Dashboard</a></li>
                <li><a href="{{route('courses.courses-listing')}}"> Courses</a></li>
                <li><a href="{{route('all-programs')}}">All Programs</a></li>
                <li><a href="{{route('courses.myCourses')}}">My Courses</a></li>
                <li><a href="{{route('update-profile')}}">Update Profile</a></li>
                {{--<li><a href="{{ route('user.reset-password-view') }}"> Reset Password</a></li>--}}

            </ul>
        </div>
    </div>
@endif