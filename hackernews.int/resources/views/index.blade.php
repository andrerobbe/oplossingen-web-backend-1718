<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hackernews.local</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <style>
        body {
        font-family: 'Lato';
        }
        .fa-btn {
        margin-right: 6px;
        }
        [class^='bg-'] {
        padding:12px;
        border-radius:4px;
        border:1px solid rgba(0,0,0,0.1);
        margin:12px 0;
        }
        button
        {
        margin:0;
        padding:0;
        background-color:transparent;
        border-width:0;
        display: inline-block;
        text-align: center;
        }
        .comments
        {
        padding:32px 0;
        }
        .comment-body {
        white-space: pre-wrap;
        }
        .comments li {
        margin: 16px 0 32px 0;
        }
        .comment-info {
        border-top: 1px solid #eee;
        margin-top:6px;
        padding-top:6px;
        font-size:10px;
        }
        .article-overview .fa-btn {
        margin-left:6px;
        }
        .form-inline { display:block;height:24px; }
        .article-overview {
        list-style-type: none;
        padding: 0px;
        }
        .article-overview li
        {
        padding: 8px 0;
        }
        .urlTitle {
        font-size: 24px;
        }
        .disabled {
        color:lightgrey;
        }
        .vote {
        float:left;
        height:48px;
        margin-right:4px;
        position: relative;
        }
        .vote .fa-btn {
        font-size:18px;
        }
        .downvote i, .downvote button
        {
        display: block;
        position:absolute;
        bottom:0;
        }
        .breadcrumb {
        padding-left:0;
        margin-bottom: 16px;
        background-color:transparent;
        }
        .panel-content {
        padding:32px;
        }
        .edit-btn
        {
        margin-left:8px;
        padding:0 4px;
        }
        .info {
        font-size:10px;
        }
        </style>
    </head>
    <body id="app-layout">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="http://oplossingen2.web-backend.local/hackernews.int/public/">
                        Hackernews.local
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="http://oplossingen2.web-backend.local/hackernews.int/public/home">Home</a></li>
                        <li><a href="http://oplossingen2.web-backend.local/hackernews.int/public/article/add">Add article</a></li>
                        <li><a href="http://oplossingen2.web-backend.local/hackernews.int/public/instructies">Instructies</a></li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <li><a href="http://oplossingen2.web-backend.local/hackernews.int/public/login">Login</a></li>
                        <li><a href="http://oplossingen2.web-backend.local/hackernews.int/public/register">Register</a></li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                test123 <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="http://oplossingen2.web-backend.local/hackernews.int/public/logout"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">Article overview</div>
                        <div class="panel-content">
                            <ul class="article-overview">
                                <li>
                                    <div class="vote">
                                        <form action="http://pascalculator.be/hackernews/public/vote/up" method="POST" class="form-inline upvote">
                                            <input type="hidden" name="_token" value="96ZPqN7yznrz9ZUc6fHgUdzfoy0anmbVOac0JMBD">
                                            <button name="article_id"value="1">
                                            <i class="fa fa-btn fa-caret-up" title="upvote"></i>
                                            </button>
                                        </form>
                                        <form action="http://pascalculator.be/hackernews/public/vote/down" method="POST" class="form-inline downvote">
                                            <input type="hidden" name="_token" value="96ZPqN7yznrz9ZUc6fHgUdzfoy0anmbVOac0JMBD">
                                            <button name="article_id"value="1">
                                            <i class="fa fa-btn fa-caret-down" title="downvote"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="url">
                                        <a href="http://arstechnica.com/gaming/2016/07/scythe-the-most-hyped-board-game-of-2016-delivers/" class="urlTitle">Scythe, the most-hyped board game of 2016, delivers</a>
                                    </div>
                                    <div class="info">
                                        5 points  | posted by Tomte | <a href="comments/1">2 comments</a>
                                    </div>
                                </li>

                                <li>
                                    <div class="vote">
                                        <form action="http://pascalculator.be/hackernews/public/vote/up" method="POST" class="form-inline upvote">
                                            <input type="hidden" name="_token" value="96ZPqN7yznrz9ZUc6fHgUdzfoy0anmbVOac0JMBD">
                                            <button name="article_id"value="2">
                                            <i class="fa fa-btn fa-caret-up" title="upvote"></i>
                                            </button>
                                        </form>
                                        <form action="http://pascalculator.be/hackernews/public/vote/down" method="POST" class="form-inline downvote">
                                            <input type="hidden" name="_token" value="96ZPqN7yznrz9ZUc6fHgUdzfoy0anmbVOac0JMBD">
                                            <button name="article_id"value="2">
                                            <i class="fa fa-btn fa-caret-down" title="downvote"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="url">
                                        <a href="https://pragprog.com/the-pragmatic-programmer/extracts/tips" class="urlTitle">Tips from the Pragmatic Programmer (2000)</a>
                                    </div>
                                    <div class="info">
                                        1 point  | posted by gasul | <a href="comments/2">1 comment</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="vote">
                                        <form action="http://pascalculator.be/hackernews/public/vote/up" method="POST" class="form-inline upvote">
                                            <input type="hidden" name="_token" value="96ZPqN7yznrz9ZUc6fHgUdzfoy0anmbVOac0JMBD">
                                            <button name="article_id"value="7">
                                            <i class="fa fa-btn fa-caret-up" title="upvote"></i>
                                            </button>
                                        </form>
                                        <form action="http://pascalculator.be/hackernews/public/vote/down" method="POST" class="form-inline downvote">
                                            <input type="hidden" name="_token" value="96ZPqN7yznrz9ZUc6fHgUdzfoy0anmbVOac0JMBD">
                                            <button name="article_id"value="7">
                                            <i class="fa fa-btn fa-caret-down" title="downvote"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="url">
                                        <a href="http://webwereld.nl/hardware/103083-duur-werkgeheugen-dat-komt-door-google" class="urlTitle">Duur werkgeheugen? Dat komt door Google</a>
                                    </div>
                                    <div class="info">
                                        0 points  | posted by Thomas | <a href="comments/7">1 comment</a>
                                    </div>
                                </li>

                                <li>
                                    <div class="vote">
                                        <form action="http://pascalculator.be/hackernews/public/vote/up" method="POST" class="form-inline upvote">
                                            <input type="hidden" name="_token" value="96ZPqN7yznrz9ZUc6fHgUdzfoy0anmbVOac0JMBD">
                                            <button name="article_id"value="3">
                                            <i class="fa fa-btn fa-caret-up" title="upvote"></i>
                                            </button>
                                        </form>
                                        <form action="http://pascalculator.be/hackernews/public/vote/down" method="POST" class="form-inline downvote">
                                            <input type="hidden" name="_token" value="96ZPqN7yznrz9ZUc6fHgUdzfoy0anmbVOac0JMBD">
                                            <button name="article_id"value="3">
                                            <i class="fa fa-btn fa-caret-down" title="downvote"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="url">
                                        <a href="https://youtube-eng.blogspot.com/2016/08/youtubes-road-to-https.html" class="urlTitle">YouTube&#039;s road to HTTPS</a>
                                    </div>
                                    <div class="info">
                                        -1 point  | posted by gasul | <a href="comments/3">0 comments</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- JavaScripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </body>
</html>