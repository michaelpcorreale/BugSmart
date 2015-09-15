<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BugSmart</title>

    <link rel="stylesheet" type="text/css" href="/css/flaticon.css">
    <link rel="stylesheet" type="text/css" href="/css/flaticon/flaticon.css">
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
                    <li class="current">
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
                        <a href="/" type="button" style="float: right; margin-right: 30px;" class="btn btn-primary">
                            Go Back
                        </a>

                        <form method="POST" action="/edit_bug" accept-charset="UTF-8">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                            <div class="form-group">

                                <input class="form-control" name="id" type="hidden" id="id" value="{{$bug->id}}" required>

                                <label for="title">Title: </label>
                                <input class="form-control" name="title" type="text" id="title" value="{{$bug->title}}" required>

                                <label for="description">Description: </label>
                                <textarea class="form-control" name="description" rows="2" id="description" required>{{$bug->description}}</textarea>

                                <label for="status">Update Status: </label>
                                <select class="form-control" name="status" id="status" required>
                                    <option></option>
                                    <option>Unresolved</option>
                                    <option>Pending</option>
                                    <option>Resolved</option>
                                </select>
                                <br>
                                <label>Assigned To: </label>
                                &nbsp;<span class="label label-default">{{ App\User::find($bug->user_id)->name }}</span>
                                <br>
                                <br>
                                <input type="submit" class="btn btn-primary" value="Save Changes">
                                <br>
                            </div>
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
