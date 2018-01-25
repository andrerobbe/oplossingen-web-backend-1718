@extends('layouts.app')

@section('content')
<div class="col-md-10 col-md-offset-1">
    
    <div class="breadcrumb">
        <a href="{{ url('/') }}">← back to overview</a>
    </div>
    <div class="panel panel-default">
        <div class="panel-content">
            <form class="form-horizontal" method="POST" action="update">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title" class="col-md-4 control-label">Comment</label>
                    <div class="col-md-6">
                        <textarea class="form-control" name="comment" id="comment" cols="30" rows="10" required>{{ $comment }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-default">
                            <span><i class="fa" aria-hidden="true"></i></span>Update Comment
                        </button>
                    </div>
                </div>
            </form>
        </div>                               
    </div>
</div>
@endsection