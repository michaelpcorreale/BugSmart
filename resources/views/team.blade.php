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
                    <li class="current">
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
                    <li class="non-current">
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
                    <div class="panel-body">
                        <h2 style="padding-left: 15px;"><strong>My Team</strong></h2>
                        <p style="font-size: 15px; color: #777; width: 60%; padding-left: 15px;">View all of your team members and stay up to date with their overall bandwidth! SmartBug displays the progress of each team member on various bugs assigned them.</p>
                        <br>
                            @foreach($users as $user)
                            <div style="width: 32%; display:inline-block;" class="well well-lg">
                                <img style="display: inline-block;" class="img-circle avatar" src="
                                    <?php

                                        $filename = 'uploads/'. $user->id .'-mini.jpg';
                                        if (file_exists($filename)) {
                                            echo 'uploads/'. $user->id .'-mini.jpg';
                                        }
                                        else {
                                            echo 'uploads/default-mini.jpg';

                                        }  ?>

                                        ">&nbsp;&nbsp;
                                    <h4 style="display: inline-block;">{{ $user->name }}</h4>
                                    <p style="margin-left: 80px;">{{ $user->email }}</p>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" style="

                                    <?php

                                    $success = DB::table('bugs')->where('user_id', $user->id)->where('status','Resolved')->count();
                                    $total = DB::table('bugs')->where('user_id', $user->id)->count();
                                    if ($total == 0) {
                                    }
                                    else {
                                        $percentage = ($success/$total)*100;
                                        echo 'width: ' . $percentage . '%';
                                    }
                                    ?>

                                    "></div>
                                    <div class="progress-bar progress-bar-warning" style="

                                    <?php

                                    $warning = DB::table('bugs')->where('user_id', $user->id)->where('status','Pending')->count();
                                    $total = DB::table('bugs')->where('user_id', $user->id)->count();
                                    if ($total == 0) {
                                    }
                                    else {
                                        $percentage = ($warning/$total)*100;
                                        echo 'width: ' . $percentage . '%';
                                    }
                                    ?>
                                    "></div>
                                    <div class="progress-bar progress-bar-danger" style="
                                    <?php

                                    $danger = DB::table('bugs')->where('user_id', $user->id)->where('status','Unresolved')->count();
                                    $total = DB::table('bugs')->where('user_id', $user->id)->count();
                                    if ($total == 0) {
                                    }
                                    else {
                                        $percentage = ($danger/$total)*100;
                                        echo 'width: ' . $percentage . '%';
                                    }
                                    ?>

                                    "></div>
                                </div>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    Resolved:&nbsp<strong>{{ DB::table('bugs')->where('user_id', $user->id)->where('status','Resolved')->count() }}</strong>
                                    &nbsp;&nbsp;
                                    Pending:&nbsp<strong>{{ DB::table('bugs')->where('user_id', $user->id)->where('status','Pending')->count() }}</strong>
                                    &nbsp;&nbsp;
                                    Unresolved:&nbsp<strong>{{ DB::table('bugs')->where('user_id', $user->id)->where('status','Unresolved')->count() }}</strong>
                                </div>
                                &nbsp;
                            @endforeach

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
