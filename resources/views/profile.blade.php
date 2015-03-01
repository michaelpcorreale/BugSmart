<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BugSmart</title>

    <link rel="stylesheet" type="text/css" href="/css/flaticon.css">
    <link href="/css/app.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand logo-width" style="color:white;">
                <span class="flaticon-bug3" id="bug"></span>
                <span id="logohalf">BUG</span>SMART
            </div>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="/auth/login">Login</a></li>
                    <li><a href="/auth/register">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/auth/logout">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<!-- Content Starts Here -->

<span class="content">

    <div class="main-tabs">
        <div>
            <nav class="main-navigation">
                <ul>
                    <li class="non-current">
                        <a href="/">
                            <span class="flaticon-download105"></span>
                            <span class="title">HOME</span>
                        </a>
                    </li>
                    <li class="non-current">
                        <a href="/team">
                            <span class="flaticon-businessmen18"></span>
                            <span class="title">TEAM</span>
                        </a>
                    </li>
                    <li class="non-current">
                        <a href="/bugs">
                            <span class="flaticon-bug4"></span>
                            <span class="title">BUGS</span>
                        </a>
                    </li>
                    <li class="current">
                        <a href="/profile">
                            <span class="flaticon-user7"></span>
                            <span class="title">PROFILE</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="main">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div style="padding-left: 30px; padding-top: 10px;" class="panel-body">

                        <h2><img class="img-circle avatar" src="{{ $img }}"> &nbsp;<strong>{{ $user->name }}</strong></h2>
                        <p style="font-size: 15px; color: #777; width: 50%; padding-left: 15px;">Add or edit your information about yourself here.  This will give your team members an opportunity to view your contact information.</p>
                        <br>
                        <form style="padding:20px; border: 1px solid gainsboro; width: 50%;" method="POST" action="http://localhost:8888/edit_profile" accept-charset="UTF-8" enctype="multipart/form-data">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                            <label for="name">Name: &nbsp;</label>
                            <input style="width: 80%" name="name" type="text" id="name" value="{{ $user->name }}">
                            <br>
                            <br>
                            <label for="email">Email: &nbsp;</label>
                            <input style="width: 80%" name="email" type="text" id="email" value="{{ $user->email }}">
                            <br>
                            <br>
                            <label for="avatar">Upload Profile Picture: &nbsp;</label>
                            <input name="avatar" type="file" id="avatar">
                            <br>
                            <p>
                                <button class="btn btn-primary btn-sm" type="submit" value="Submit">Save Changes</button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</span>


<!-- Content Ends Here -->


<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
