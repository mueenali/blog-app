@extends('layouts.blog-home')

@section('content')


    <div class="col-md-8">
    @if($posts)
        @foreach($posts as $post)
            <!-- First Blog Post -->
                <h2>
                    {{$post->title}}
                </h2>
                <p class="lead">
                    by {{$post->user->name}}
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->toDayDateTimeString()}}
                </p>
                <hr>
                <img class="img-responsive" src="{{$post->photo ? '/'.$post->photo->path : $post->placeHolder()}}"
                     alt="">
                <hr>
                <p>{!! str_limit($post->body,20)!!}</p>
                <a class="btn btn-primary" href="{{route('post.index',$post->slug)}}">Read More <span
                        class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
        @endforeach
    @endif

    <!-- Pager -->
        <div class="row ">
            <div class="col-sm-6 col-sm-offset-5">
                {{$posts->links()}}
            </div>
        </div>

    </div>

@endsection
