@extends('layouts.app')

@section('content')
<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">Article overview</div>
        <div class="panel-content">
            <ul class="article-overview">
                @foreach ($articles as $article)
                    <li>
                        <!-- Checking for upvotes -->
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
                                        <input type="hidden" name="_method" value="PUT">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="vote" value="up">
                                        <button name="article_id" value="{{ $article->id }}">
                                            <i class="fa fa-btn fa-caret-up" title="upvote"></i>
                                        </button>
                                    </form>
                                    <form action="{{ url('vote/down/' . $article->id) }}" method="POST" class="form-inline downvote">
                                        <input type="hidden" name="_method" value="PUT">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="vote" value="down">
                                        <button name="article_id" value="{{ $article->id }}">
                                            <i class="fa fa-btn fa-caret-down" title="downvote"></i>
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
                        

                        @if (Auth::check())
                            @if (auth()->user()->id == $article->user->id)
                                <div class="url" style="display: flex;">
                                    <a class="urlTitle" href="{{ $article->url }}">{{ $article->title }}</a>

                                    <form action="article/{{ $article->id }}/edit" method="GET">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-info btn-sm" style="margin: 12px; line-height: 50%;">
                                            <i class="fa" aria-hidden="true"></i>edit
                                        </button>
                                    </form>
                                </div>
                            @endif
                        @endif

                        <div class="info">
                            {{ $article->votes }} points | posted by {{ $article->posted_by }} |
                            <a href="comments/{{ $article->id }}">{{ $article->comment->count() }} comments</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection