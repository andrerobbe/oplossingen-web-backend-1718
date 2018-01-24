@extends('layouts.app')

@section('content')
<div class="col-md-10 col-md-offset-1">
    
    <div class="breadcrumb">
        
        <a href="{{ url('/') }}">← back to overview</a>
    </div>
    
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            {{ $article->title }}
        </div>
        <div class="panel-content">

            <!-- votes -->
             @if (Auth::check())
                <div class="vote">                        
                    <form action="{{ url('/vote/up') }}" method="POST" class="form-inline upvote">
                        {{ csrf_field() }}
                        <button name="article_id"value="1">
                        <i class="fa fa-btn fa-caret-up" title="upvote"></i>
                        </button>
                    </form>

                    <form action="{{ url('/vote/down') }}" method="POST" class="form-inline downvote">
                        {{ csrf_field() }}
                        <button name="article_id"value="1">
                        <i class="fa fa-btn fa-caret-down" title="downvote"></i>
                        </button>
                    </form>
                </div>
             @else
                 <div class="vote">
                    <div class="form-inline upvote">
                        <button>
                            <i class="fa fa-btn disabled fa-caret-up" title="Login to vote!"></i>
                        </button>
                    </div>
                    
                    <div class="form-inline downvote">
                        <button>
                            <i class="fa fa-btn disabled fa-caret-down" title="Login to vote!"></i>
                        </button>
                    </div>
                </div>
            @endif

            <!-- url -->
            <div class="url">
                <a href="{{ $article->url }}" class="urlTitle">{{ $article->title }}</a>
            </div>
            <div class="info">
                {{ $article->votes }} points | posted by {{ $article->posted_by }} | {{ $article->comment->count() }} comments
            </div>

            <!-- Comment list -->
            <div class="comments">
                <ul>
                    @foreach ($article->comment as $comment)
                    <li style="list-style-type: none">
                        <div class="comment-body">{{ $comment->body }}</div>
                        <div class="comment-info">Posted by {{ $comment->user->name }} on {{ $article->created_at }}</div>

                        <!-- edit/delete button -->
                        @if (Auth::check())
                            @if (auth()->user()->id == $comment->user->id)
                            <div style="display:flex;">
                                <form action="{{ $comment->id }}/edit" method="GET" style="margin:0 2px 0 0;">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-info">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </button>
                                </form>
                                <form action="{{ $comment->id }}/delete" method="GET">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>
                            @endif
                        @endif
                    </li>

                    @endforeach
                </ul>
            </div>
            
            @if (Auth::check())
                <!-- New Comment Form -->
                <form action="{{ url('/comments/add') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                     <!-- Comment data -->
                    <div class="form-group">
                        <label for="body" class="col-sm-3 control-label">Comment</label>
                        <div class="col-sm-6">
                            <textarea type="text" name="body" id="body" class="form-control"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="article_id" value="{{ $article->id }}">
                    <!-- Add comment btn -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-plus">Add comment</i>
                            </button>
                        </div>
                    </div>
                </form>
            @else 
                <p>You need to be <a href="{{ route('login') }}">logged in</a> to comment.</p>
            @endif
        </div>                               
    </div>
</div>
@endsection