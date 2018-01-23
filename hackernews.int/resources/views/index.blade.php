@extends('layouts.app')

@section('content')
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
@endsection