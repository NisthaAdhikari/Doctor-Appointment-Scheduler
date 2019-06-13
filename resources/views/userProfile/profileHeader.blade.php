<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="myDiv">
        <a class="navbar-brand" href="" style="margin-left: 0px">Doctor Appoinment Scheduler</a>
      <a class="br" href="{{route('patientProfile',$users->id)}}" style="margin-left: 15px; font-size: 14px">My Profile</a>
      <a class="br" href="{{route('myAppointments', $users->id)}}" style="margin-left: 10px; font-size: 14px">My Appointment</a>
      <a class="br" href="{{route('myRepo', $users->id)}}" style="margin-left: 10px; font-size: 14px">My Repository</a>
      <a class="br" href="{{route('askQuestions',$users->id)}}" style="margin-left: 10px; font-size: 14px">Ask Questions</a>
      </div>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <div class="hidden-xs navbar-form navbar-right">
        <a href="{{route('logout')}}" style="color: #ffffff;">Logout</a>
        <span></span>


      </div>

      <!--/.navbar-collapse -->
    </div>
  </div>
</nav>