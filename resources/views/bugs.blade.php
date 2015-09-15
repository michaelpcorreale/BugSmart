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
                    <li class="current">
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

                        <!-- Button trigger modal -->
                        <button type="button" style="float: right; margin-top: 30px; margin-right: 30px;" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                            &#43;&#32; Report a Bug
                        </button>
                        <h2 style="padding-left: 15px;"><strong>Manage Bugs</strong></h2>
                        <p style="font-size: 15px; color: #777; width: 50%; padding-left: 15px;">Bugs can be assigned to anyone on the team. Once a bug is reported, SmartBug will keep track of when the issue has been resolved.</p>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Report a Bug</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="/report_bug" accept-charset="UTF-8">
                                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                            <div class="form-group">

                                                <label for="title">Title: </label>
                                                <input class="form-control" name="title" type="text" id="title" placeholder="Enter a Title" required>

                                                <label for="description">Description: </label>
                                                <textarea class="form-control" name="description" rows="2" id="description" placeholder="Enter a Description" required></textarea>
                                                <label for="status">Status: </label>
                                                <select class="form-control" name="status" id="status" required>
                                                    <option value=""></option>
                                                    <option>Unresolved</option>
                                                    <option>Pending</option>
                                                    <option>Resolved</option>
                                                </select>

                                                <label for="priority">Priority: </label>
                                                <select class="form-control" name="priority" id="priority" required>
                                                    <option value=""></option>
                                                    <option>Low</option>
                                                    <option>Medium</option>
                                                    <option>High</option>
                                                    <option>Critical</option>
                                                </select>

                                                <label for="user_id">Assign To: </label>
                                                <select class="form-control" name="user_id" id="user_id" required>
                                                    <option value=""></option>
                                                    @foreach($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>

                                                <br>
                                                <input type="submit" class="btn btn-primary form-control">
                                                <br>
                                            </div>
                                        </form>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- End Modal -->

                        <br>
                        <table class="table table-bordered">
                            <th>Assigned To</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Priority</th>
                            <th>Status</th>
                            @foreach($bugs as $bug)
                                <tr class="
                                    <?php if ($bug->status == 'Resolved') {
                                                echo "success";
                                          }
                                          elseif ($bug->status == 'Unresolved') {
                                                echo "danger";
                                          }
                                          else {
                                                  echo "warning";
                                          }
                                    ?>">
                                    <td><span class="label label-default">{{ App\User::find($bug->user_id)->name }}</span></td>
                                    <td>{{ $bug->title }}</td>
                                    <td>{{ $bug->description }}</td>
                                    <td>{{ $bug->priority }}</td>
                                    <td>{{ $bug->status }}</td>
                                </tr>
                            @endforeach
                        </table>
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
