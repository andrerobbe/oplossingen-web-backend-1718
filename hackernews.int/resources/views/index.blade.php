@extends('layouts.app')

@section('content')
<div class="col-md-10 col-md-offset-1">

    @if ( session('success') )
        <div class="panel panel-success">
            <div class="panel-heading">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">Article overview</div>
        <div class="panel-content">
            <ul class="article-overview">
                @foreach ($articles as $article)
                    <li>
                        <!-- Checking for votes -->
                        @if (Auth::check())
                            <!--not allowed to vote on your own -->
                            @if (auth()->user()->id == $article->user->id)
                                <div class="vote">
                                    <div class="form-inline upvote">
                                        <button>
                                            <i class="fa fa-btn disabled fa-caret-up" title="You can't upvote on your own articles!"></i>
                                        </button>
                                    </div>
                                    
                                    <div class="form-inline downvote">
                                        <button>
                                        <i class="fa fa-btn disabled fa-caret-down" title="You can't downvote on your own aticles!"></i>
                                        </button>
                                    </div>
                                </div>
                            <!--Allowed to vote -->
                            @else
                                <div class="vote">
                                    <form action="{{ url('vote/up/' . $article->id) }}" method="POST" class="form-inline upvote">
                                        {{ method_field('PUT') }}
                                        {{ csrf_field() }}
                                        <input type="hidden" name="vote" value="up">
                                        <button name="article_id" value="{{ $article->id }}">
                                            <i class="fa fa-btn fa-caret-up" title="Upvote"></i>
                                        </button>
                                    </form>
                                    <form action="{{ url('vote/down/' . $article->id) }}" method="POST" class="form-inline downvote">
                                        {{ method_field('PUT') }}
                                        {{ csrf_field() }}
                                        <input type="hidden" name="vote" value="down">
                                        <button name="article_id" value="{{ $article->id }}">
                                            <i class="fa fa-btn fa-caret-down" title="Downvote"></i>
                                        </button>
                                    </form>
                                </div>
                            @endif

                        <!-- Not allowed to vote > login required -->
                        @else
                            <div class="vote">
                                <div class="form-inline upvote">
                                    <button>
                                        <i class="fa fa-btn disabled fa-caret-up" title="You need to log in to vote!"></i>
                                    </button>
                                </div>
                                
                                <div class="form-inline downvote">
                                    <button>
                                    <i class="fa fa-btn disabled fa-caret-down" title="You need to log in to vote!"></i>
                                    </button>
                                </div>
                            </div>
                        @endif
                        
                        <!-- Title / Url -->
                        <div class="url" style="display: flex;">
                            <a class="urlTitle" href="{{ $article->url }}">{{ $article->title }}</a>
                            @if (Auth::check())
                                @if (auth()->user()->id == $article->user->id)
                                    <!-- edit/delete buttons -->
                                    <form action="article/{{ $article->id }}/edit" method="GET" style="margin: 10px 2px 0 5px">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-info btn-sm" style="line-height: 100%;">
                                            <i class="fa" aria-hidden="true"></i>edit
                                        </button>
                                    </form>
                                    <form action="article/{{ $article->id }}/delete" method="GET" style="margin-top: 10px;">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" style="line-height: 100%;">
                                            <i class="fa fa-trash" aria-hidden="true"></i> delete
                                        </button>
                                    </form>
                                @endif
                            @endif
                        </div>
                        <div class="info">
                            {{ $article->votes }} points | posted by {{ $article->posted_by }} |
                            <a href="comments/{{ $article->id }}">{{ $article->comment->count() }} comments</a>
                        </div>

                        <!-- delete box -->
                        @if ($article->id == session('article-id'))
                            @if(session('delete'))
                                <div class="alert alert-danger" style="margin:5px 0px 0 0;">
                                {{ session('delete') }}

                                    <div style="display:flex">
                                        <form action="article/{{ $article->id }}/confirm-delete" method="POST">
                                        {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash" aria-hidden="true"></i> delete
                                            </button>
                                        </form>

                                        <form action="{{ URL::previous() }}">
                                        {{ csrf_field() }}
                                            <button type="submit" class="btn btn-secondary">
                                            <i class="fa fa-ban" aria-hidden="true"></i> Cancel
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        @endif

                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection