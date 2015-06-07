<script src = "scripts/jquery/jquery-1.11.3.min.js"></script>    
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
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

</style>



</head>
<body>


<div class="navbar">
    <div class="navbar-inner">
        <a class="brand" href="/">
            <img id="logo_pic" src="pictures/ROAM_header.png">
        </a>
        <ul class="nav navbar-nav">
            <li><a href="#">Book a Tour</a></li>
            <li><a href="#">How It Works</a></li>
            <ul class="dropdown-menu">
                <li><a href="#">Trust &mp; Safety</a></li>
                <li><a href="quiz">Frequently Asked Questions</a></li>
            </ul>
        </ul>
        <ul class="nav navbar-nav pull-right">
            @if (Auth::guest())
            <li><a href="/login">Log In</a></li>
            <li><a href="#">Sign Up</a></li>
            @else
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                {{{ User::find(Auth::id())->display_name }}}
                <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="/home">Home</a></li>
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
