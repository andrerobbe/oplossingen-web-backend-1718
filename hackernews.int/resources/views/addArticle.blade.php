@extends('layouts.app')

@section('content')
<div class="col-md-10 col-md-offset-1">

    <div class="breadcrumb">
        <a href="{{ url('/') }}">← back to overview</a>
    </div>
    
    <div class="panel panel-default">
        <div class="panel-heading">Add article</div>
        <div class="panel-content">
            
            
            <!-- New Task Form -->
            @if (isset($article))
            <form action="{{ url('/article/' . $article->id . '/update') }}" method="POST" class="form-horizontal">
            {{ method_field('PUT') }}
            @else
            <form action="{{ url('/addArticle') }}" method="POST" class="form-horizontal">
            @endif
                {{ csrf_field() }}

                <!-- Article data -->
                <div class="form-group">
                    <label for="article-title" class="col-sm-3 control-label">Title (max. 255 characters)</label>
                    <div class="col-sm-6">
                        <input type="text" name="title" id="article-title" class="form-control" required @if (isset($article)) value="{{$article->title}}" @endif>
                    </div>
                </div>
                
                <!-- Article url -->
                <div class="form-group">
                    <label for="article-url" class="col-sm-3 control-label">URL (https://.. required)</label>
                    <div class="col-sm-6">
                        <input type="text" name="url" id="article-url" class="form-control" required @if (isset($article)) value="{{$article->url}}" @endif>
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <!-- Update -->
                             @if (isset($article))
                                <i class="fa fa-pencil-square-o"></i> Update Article

                            <!-- Add -->
                            @else
                                <i class="fa fa-plus"></i> Add Article
                            @endif
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection










