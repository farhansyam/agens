<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>AGENS</title>
    <!-- chartist CSS -->
    {{-- ChartScript --}}
    <link href="{{url('assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css')}}" rel="stylesheet">
    <!--c3 CSS -->
    <link href="{{url('assets/extra-libs/c3/c3.min.css')}}" rel="stylesheet">
    <link href="{{url('css/style.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- <link href="{{url('css/tambah.css')}}" rel="stylesheet"> -->
    <!-- This page CSS -->
    <link href="{{url('css/pages/dashboard1.css')}}" rel="stylesheet">
    <!-- This page CSS -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
      *{
      font-family: 'Poppins', sans-serif;
      }
</style>
  </head>
  <body>
    <div class="main-wrapper" id="main-wrapper">
      <!-- ============================================================== -->
      <!-- Preloader - style you can find in spinners.css -->
      <!-- ============================================================== -->
      <div class="preloader">
        <div class="loader">
          <div class="loader__figure"></div>
          <p class="loader__label">AGENS</p>
        </div>
      </div>
      <!-- ============================================================== -->
      <!-- Preloader - style you can find in spinners.css -->
      <!-- ============================================================== -->
      <header class="topbar">
        <!-- ============================================================== -->
        <!-- Navbar scss in header.scss -->
        <!-- ============================================================== -->
        <nav>
          <div class="nav-wrapper">
            <!-- ============================================================== -->
            <!-- Logo you can find that scss in header.scss -->
            <!-- ============================================================== -->
            <a href="javascript:void(0)" class="brand-logo">
              <span class="icon">
                <img class="light-logo" src="../../assets/images/logo-light-icon.png" alt="Admin">
              </span>
              <span class="text">
                <img class="light-logo" src="../../assets/images/logo-teks.png" alt="Admin" style="width:100px; height:23px;">
              </span>
            </a>
            <!-- ============================================================== -->
            <!-- Logo you can find that scss in header.scss -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Left topbar icon scss in header.scss -->
            <!-- ============================================================== -->
            <ul class="left">
              <li class="hide-on-med-and-down">
                <a href="javascript: void(0);" class="nav-toggle">
                  <span class="bars bar1"></span>
                  <span class="bars bar2"></span>
                  <span class="bars bar3"></span>
                </a>
              </li>
              <li class="hide-on-large-only">
                <a href="javascript: void(0);" class="sidebar-toggle">
                  <span class="bars bar1"></span>
                  <span class="bars bar2"></span>
                  <span class="bars bar3"></span>
                </a>
              </li>
            </ul>
            <!-- ============================================================== -->
            <!-- Left topbar icon scss in header.scss -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right topbar icon scss in header.scss -->
            <!-- ============================================================== -->
            <ul class="right">
              
              <!-- ============================================================== -->
              <!-- Notification icon scss in header.scss -->
              <!-- ============================================================== -->
             <li>
                <a onclick="alert(asd)" class="dropdown-trigger kliknotif" href="javascript: void(0);" data-target="noti_dropdown"><i class="fa fa-bell">&nbsp;@php if($jumlahNotif >=1){ echo $jumlahNotif;} else {echo '';}@endphp</i></a>
                <ul id="noti_dropdown" class="mailbox dropdown-content">
                  <li>
                    <div class="drop-title" onclick="alert(asd)">Notifications</div>
                  </li>
                  <li>
                    <div class="message-center">
                      <!-- Message -->
                      
                      @foreach ($notifs as $notif)
                      <a href="#">
                        <span class="btn-floating btn-large yellow"><i class="material-icons">warning</i></span>
                        <div class="mail-contnet">
                          <h5>{{$notif->title}}</h5>
                          <span class="mail-desc">{{$notif->deskripsi}}</span>
                        <span class="time">{{$notif->time}}</span>
                    </div>
                      </a>
                      @endforeach
                      <a class="center-align" href="{{url('setnotif')}}"> <strong>clear all
                          notifications</strong> </a>
                    </div>
                  </li>
                </ul><!-- ============================================================== -->
              <!-- Comment topbar icon scss in header.scss -->
              <!-- ============================================================== -->
              </li>
              <!-- ============================================================== -->
              <!-- Comment topbar icon scss in header.scss -->
              <!-- ============================================================== -->
              </li>
              <!-- ============================================================== -->
              <!-- Profile icon scss in header.scss -->
              <!-- ============================================================== -->
              <li><a class="dropdown-trigger" href="javascript: void(0);" data-target="user_dropdown"><img
                    src="{{asset('assets/images/users/2.jpg')}}" alt="user" class="circle profile-pic"></a>
                <ul id="user_dropdown" class="mailbox dropdown-content dropdown-user">
                  <li>
                    <div class="dw-user-box">
                      <div class="u-img"><img src="{{ url('public/Image/'.auth()->user()->avatar)}}" alt="user"></div>
                      <div class="u-text">
                        <h4>admin</h4>
                        <p>admin@gmail.com</p>
                        <a href="{{route('profile')}}" class="waves-effect waves-light btn-small red white-text">View
                          Profile</a>
                      </div>
                    </div>
                  </li>
                  <li role="separator" class="divider"></li>
                  <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}<i class="material-icons">power_settings_new</i></a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form> 
                </ul>
              </li>
            </ul>
            <!-- ============================================================== -->
            <!-- Right topbar icon scss in header.scss -->
            <!-- ============================================================== -->
          </div>
        </nav>
        <!-- ============================================================== -->
        <!-- Navbar scss in header.scss -->
        <!-- ============================================================== -->
      </header>
      <!-- ============================================================== -->
      <!-- Sidebar scss in sidebar.scss -->
      <!-- ============================================================== -->
      <aside class="left-sidebar">
        <ul id="slide-out" class="sidenav" style="background-image: url({{asset('assets/images/pattern-fix.png')}});">
          <li>
            <div class="user-profile" style="background-image: url(../../assets/images/user-bg.jpg);">
                <h6 class="white-text name"><i class="material-icons m-r-10">account_circle</i> <span class="hidden">{{Auth::user()->username}}</span></h6>
            </div>
          </li>
          <li>
              <li class="{{ (request()->segment(1) == 'dashboard') ? 'active' : '' }}">
                <a href="{{url('dashboard')}}" class="collapsible-header "><i class="material-icons">dashboard</i><span class="hide-menu"> Dashboard </span></a>
              </li>
              {{-- <li class=" ">      
                <a href="#" class="collapsible-header "><i class="material-icons">settings_applications</i><span class="hide-menu"> Settings
                  </span></a>
              </li> --}}
                <li class="{{ (request()->segment(1) == 'log') ? 'active' : '' }}">
                  <a href="{{url('log')}}" class="collapsible-header "><i class="material-icons">set_meal</i><span class="hide-menu"> Kolam
                  </span></a>
              </li>
                {{-- <li class="{{ (request()->segment(1) == 'profile') ? 'active' : '' }}"> --}}
                  {{-- <a href="profile/{{auth()->user()->name}}" class="collapsible-header"><i class="material-icons">people</i><span class="hide-menu"> Profile </span></a> --}}
              {{-- </li> --}}
              <li class="{{ (request()->segment(1) == 'info') ? 'active' : '' }}">
                  <a href="{{url('info')}}" class="collapsible-header"><i class="material-icons">help</i><span class="hide-menu"> Info </span></a>
              </li>
              <!-- end -->
            </li>
          </ul>
      </aside>
      <!-- ============================================================== -->
      <!-- Sidebar scss in sidebar.scss -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper scss in scafholding.scss -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Title and breadcrumb -->
        <!-- ============================================================== -->
        <div class="page-titles">
          <div class="d-flex align-items-center">
            <h5 class="font-medium m-b-0">Dashboard</h5>
            <div class="custom-breadcrumb ml-auto">
               <?php $segments = ''; ?>
                  @foreach(Request::segments() as $segment)
                          <a href="{{ $segments }}" class="breadcrumb">{{$segment}}</a>
                  @endforeach
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- Container fluid scss in scafholding.scss -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Sales Summery -->
          <!-- ============================================================== -->
          @yield('content')
        </div>
      </div>
<div class="chat-windows "></div>
<!-- ============================================================== -->
<!-- Right Sidebar -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- All Required js -->
<!-- ============================================================== -->
<script src="{{url('assets/libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{url('js/materialize.min.js')}}"></script>
<script src="{{url('assets/libs/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
<!-- ============================================================== -->
<!-- Apps -->
<!-- ============================================================== -->
<script src="{{url('js/app.js')}}"></script>
<script src="{{url('js/app.init.js')}}"></script>
<script src="{{url('js/app-style-switcher.js')}}"></script>
<!-- ============================================================== -->
<!-- Custom js -->
<!-- ============================================================== -->
<script src="{{url('js/custom.min.js')}}"></script>
<!-- ============================================================== -->
<!-- This page plugin js -->
<!-- ============================================================== -->
{{-- <script src="{{url('assets/libs/chartist/dist/chartist.min.js')}}"></script> --}}
{{-- <script src="{{url('assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script> --}}
<!--c3 JavaScript -->
{{-- <script src="{{url('assets/extra-libs/c3/d3.min.js')}}"></script> --}}
{{-- <script src="{{url('assets/extra-libs/c3/c3.min.js')}}"></script> --}}
{{-- <script src="{{url('assets/libs/chart.js/dist/Chart.min.js')}}"></script> --}}
{{-- <script src="{{url('js/pages/dashboards/dashboard1.js')}}"></script> --}}
<script src="{{url('assets/extra-libs/sparkline/sparkline.js')}}"></script>
                <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
                <!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<!-- TODO: Add SDKs for Firebase products that you want to use
    https://firebase.google.com/docs/web/setup#available-libraries -->

<script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
         apiKey: "AIzaSyDEDpvikpUuySB-fn4sEsKU2BumgIYQuec",
          authDomain: "monitoring-kolam-6febd.firebaseapp.com",
          databaseURL: "https://monitoring-kolam-6febd-default-rtdb.firebaseio.com",
          projectId: "monitoring-kolam-6febd",
          storageBucket: "monitoring-kolam-6febd.appspot.com",
          messagingSenderId: "121423439938",
          appId: "1:121423439938:web:3338eadf43862190f225db"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);

    const messaging = firebase.messaging();
    let cs = document.head.querySelector('meta[name="csrf-token"]');
    function initFirebaseMessagingRegistration() {
        messaging.requestPermission().then(function () {
            return messaging.getToken()
        }).then(function(token) {
            window.axios.defaults.headers.common['X-CSRF-TOKEN'] = cs.content;
            axios.post("{{ route('fcmToken') }}",{
                _method:"PATCH",
                token,cs
            }).then(({data})=>{
                console.log(data)
            }).catch(({response:{data}})=>{
                console.error(data)
            })

        }).catch(function (err) {
            console.log(`Token Error :: ${err}`);
        });
    }

    initFirebaseMessagingRegistration();
  
    messaging.onMessage(function({data:{body,title}}){
        new Notification(title, {body});
    });

    function notifyMe(){
      if (!("Notification" in window)) {
        // Check if the browser supports notifications
        alert("This browser does not support desktop notification");
      } else if (Notification.permission === "granted") {
        // Check whether notification permissions have already been granted;
        // if so, create a notification
        const notification = new Notification("Hi there!");
        // …
      } else if (Notification.permission !== "denied") {
        // We need to ask the user for permission
        Notification.requestPermission().then((permission) => {
          // If the user accepts, let's create a notification
          if (permission === "granted") {
            const notification = new Notification("Hi there!");
            // …
          }
        });
      }

  // At last, if the user has denied notifications, and you
  // want to be respectful there is no need to bother them anymore.
}
</script>
</body>
</html>