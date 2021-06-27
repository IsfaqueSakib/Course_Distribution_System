<!DOCTYPE html>

<html lang="en">
<head>
  <!-- Meta Tags -->
  <meta charset="utf-8"/>

  <!-- Site Title-->
  <title>Delex HTML5 Free Responsive Template | Template Stock</title>

  <!-- Mobile Specific Metas-->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

  <link rel="stylesheet" href="{{asset('frontend/css/profile_css.css')}}"/>
  <link rel="stylesheet" href="{{asset('frontend/css/assigned_course_table.css')}}"/>

  <link rel="stylesheet" href="{{asset('frontend/css/editProfilecss.css')}}"/>

</head>

<body>
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">

        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ url('/home') }}">{{ Auth::user()->name }}'s Profile</a>
        <ul class="navbar-nav align-items-center d-none d-md-flex">

          <li>
              <a class="nav-link pr-0" href="{{ url('/') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center media-body ml-2 d-none d-lg-block">
              <span class="mb-0 text-sm  font-weight-bold">Home</span>
              </div>
              </a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="{{url('/home')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <!--<span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="https://demos.creative-tim.com/argon-dashboard/assets/img/theme/team-4.jpg">
                </span> -->

                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
                </div>
              </div>
            </a>
          </li>
          <li>
              <a class="nav-link pr-0" href="{{ url('/user_logout') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center media-body ml-2 d-none d-lg-block">
              <span class="mb-0 text-sm  font-weight-bold">Logout</span>
              </div>
              </a>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Top navbar -->

    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: {{asset('frontend/images/profile.jpg')}}; width:100%; height: :100%; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello {{ Auth::user()->name }}</h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your courses</p>
            <a href="{{ url('/edit_profile') }}" class="btn btn-info">Edit profile</a>
            <a href="{{ url('/courseSelection') }}" class="btn btn-info">Select Course</a>
            <a href="{{ url('/currentCourse') }}" class="btn btn-info">Selected Courses</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
      <div class="container-fluid mt--7">
          @yield('profile_content')
      </div>
    </div>
  </div>
  <footer class="footer">
    <div class="row align-items-center justify-content-xl-between">
      <div class="col-xl-6 m-auto text-center">

      </div>
    </div>
  </footer>
</body>

</html>
