<link rel="stylesheet" href="{{ asset('public/admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
<style type="text/css">
  body{
  background-image:url('public/assets/img/BG.jpg');
  background-position: center center;
  background-repeat:  no-repeat;
  background-attachment: fixed;
  background-size:  cover;
}

.form{
 background:rgba(255, 255, 255, 0.58);
 box-shadow: 0px 0px 0px 4px #cac8c8;
 border-radius:20px;
 width:300px;
 margin: auto;
 padding:20px;
}

.form h1{
 color:#f1eded;
 text-align:center;
}
.form h1{
 text-align:center;
}

.fac{
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: 18px;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

#input{
 background: rgba(235, 235, 235, 0.55);
 font-size:12pt;
 padding-left:37px;
 font-family:arial;
 color:#544343;
 width:100%;
 height:40px;
 
 margin:5px;
 border-radius:7px;
 border:none;
}
#inputa{
 background:rgb(31, 171, 3);
 font-size:12pt;
 font-family:arial;
 color:#eeeeee;
 width:100%;
 height:40px;
 cursor:pointer;
 margin:5px;
 border-radius:7px;
 border:none;
}
#inputaa{
 font-size:12pt;
 font-family:arial;
 color:#c11212;
 width:100%;
 height:40px;
 cursor:pointer;
 margin:5px;
 border-radius:7px;
 border:none;
}

#input:hover, #input:focus{
 background:rgb(243, 233, 233);
 outline-style:none;
}
#input[type="submit"]:hover, #input[type="submit"]:focus{
 background:rgb(40, 199, 9);
}
#inputa:hover, #inputa:focus{
 background:rgb(243, 233, 233);
 outline-style:none;
}
#inputa:hover, #inputa:focus{
 background:rgb(40, 199, 9);
}

form,form .input-icon{width:100%;}
form .input-icon{position:relative;}

/**Mengatur posisi icon di dalam form**/
form input+i{
  position:absolute;
  left:15px;
  top:16px;
 
  color:#777;
}
.field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -29px;
  position: relative;
  z-index: 2;
  color:#777;
}

</style>
<br>
<br>
<br>


<center>
  <img src="{{url('public/assets/img/ic-user.png')}}" class="icon lazy" height="100px" width="500px">
</center>
<br>
<br>

<div class="form">
  <h1>LOG IN</h1> 
   <form method="POST" action="{{ route('login') }}">
      
     {{ csrf_field() }}
       <div class="input-icon  {{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
        <input id="input" type="text" name="email" value="{{ old('email') }}" placeholder="Ketikan ID Anda" required autofocus>
        <i class="fac fa-user"></i>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if ($errors->has('email'))
            <span class="help-block" id="inputaa">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
      <div class="input-icon {{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
        <input id="input" class="ini" type="password" name="password" required placeholder="Ketikan Password Anda">
        <i class="fac fa-lock"></i>
        <span toggle=".ini" class="fa fa-fw fa-eye field-icon toggle-password"></span>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if ($errors->has('password'))
            <span class="help-block" id="inputaa">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>
      
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" id="inputa">SIGN IN</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
 </div>

<script src="{{ asset('public/admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script type="text/javascript">
  $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

});
   $(function() {
        $('.lazy').lazy();
    });
</script>
</body>
</html>

