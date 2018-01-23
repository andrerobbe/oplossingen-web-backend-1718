@extends('layouts.app')

@section('content')
<div class="col-md-10 col-md-offset-1">
    
    <div class="breadcrumb">
        
        <a href="{{ url('/') }}">← back to overview</a>
    </div>
    <!-- Display Validation Errors -->
    <!-- resources/views/common/errors.blade.php -->
    
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            Article: Scythe, the most-hyped board game of 2016, delivers
        </div>
        <div class="panel-content">
            <div class="vote">                        
                <form action="{{ url('/vote/up') }}" method="POST" class="form-inline upvote">
                    <input type="hidden" name="_token" value="96ZPqN7yznrz9ZUc6fHgUdzfoy0anmbVOac0JMBD">
                    <button name="article_id"value="1">
                    <i class="fa fa-btn fa-caret-up" title="upvote"></i>
                    </button>
                </form>
                <form action="{{ url('/vote/down') }}" method="POST" class="form-inline downvote">
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
                6 points  | posted by Tomte | 2 comments
            </div>
            <div class="comments">
                <ul>
                    <li>
                        
                        <div class="comment-body">Can someone explain to me why it needed to raise $1.8 Million dollars via Kickstarter? Does that cover production costs as well as development time?
                        Wouldn&#039;t it be more fair to consumers if only development cost was covered by the kickstarter and then production costs were covered by actual pre-orders?</div>
                        <div class="comment-info">
                            Posted by eto3 on 2016-08-01 18:46:23
                        </div>
                    </li>
                    <li>
                        <div class="comment-body">This is one of those games that looks complicated until you start playing. I was one of the Kickstarter backers, and was a bit unsure of the suitability of the game for casual play.
                        After 22 plays and counting with many different people, I can safely say</div>
                        <div class="comment-info">
                            Posted by gasul on 2016-08-01 18:30:35
                        </div>
                    </li>
                </ul>
            </div>
            
            <!-- New Task Form -->
            <form action="{{ url('/comments/add') }}" method="POST" class="form-horizontal">
                <input type="hidden" name="_token" value="96ZPqN7yznrz9ZUc6fHgUdzfoy0anmbVOac0JMBD">
                <!-- Comment data -->
                <div class="form-group">
                    <label for="body" class="col-sm-3 control-label">Comment</label>
                    <div class="col-sm-6">
                        <textarea type="text" name="body" id="body" class="form-control"></textarea>
                    </div>
                </div>
                <input type="hidden" name="article_id" value="1">
                <!-- Add comment -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add comment
                        </button>
                    </div>
                </div>
            </form>
        </div>                               
    </div>
</div>
@endsection