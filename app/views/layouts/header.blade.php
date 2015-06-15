<script src = "/scripts/jquery/jquery-1.11.3.min.js"></script>    
<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<style type="text/css">
body{
    background-color: #F2F2F2;
}
.navbar {
    margin: 0px;
    font-size: 20px;
}
.navbar .brand {
    padding-top: 0px;
    padding-bottom: 0px;
}
.navbar-nav li a {
    line-height: 38px;
}
.container {
    width: 100%;
}
</style>



</head>
<body>


<div class="navbar">
    <div class="navbar-inner">
        <a class="brand" href="/">
            <img id="logo_pic" src="/pictures/ROAM_header.png">
        </a>
        <ul class="nav navbar-nav">
            
            @if (!empty($userinfo->is_guide))
            <li><a href="/tours">Find a Roamer</a></li>
            @else
            <li><a href="/tours">Find a Tour</a></li>
            @endif
            {{-- <li><a href="#">How It Works</a></li> --}}
            <ul class="dropdown-menu">
                <li><a href="#">Trust &mp; Safety</a></li>
                <li><a href="quiz">Frequently Asked Questions</a></li>
            </ul>
            @if (!empty($userinfo->is_guide))
            <li><a href="/tours/create">Schedule A Tour</a></li>
            @else
            <li><a href="/tours/create">Request a Tour</a></li>
            @endif
        </ul>
        <ul class="nav navbar-nav pull-right">
            @if (Auth::guest())
            <li><a href="/login">Log In</a></li>
            <li><a href="/register">Sign Up</a></li>
            @else
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                @if (!empty($userinfo->display_name))
                {{{ $userinfo->display_name }}}
                @endif
                <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="/tours">Home</a></li>
                <li><a href="/editProfile">Edit Profile</a></li>
                <li class="divider"></li>
                <li><a href="/logout">Sign Out</a></li>
            </ul>
            </li>
            @endif
        </ul>
    </div>

</div>

<div class="container">
