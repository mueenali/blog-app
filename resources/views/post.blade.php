@extends('layouts.blog-home')

@section('title')
    <title>Blog Home</title>
@endsection

@section('content')
    <!-- Blog Post -->
    <div class="col-md-8">
    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->toDayDateTimeString()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo ? '/'.$post->photo->path : $post->placeHolder()}}" alt="">

    <hr>

    <!-- Post Content -->
    <blockquote class="blockquote">
        <p class="mb-0">{!! $post->body !!}</p>
    </blockquote>

    <hr>

    <!-- Blog Comments -->

    <!-- Comments Form -->
    {{--@if(Auth::check())--}}
        {{--<div class="well">--}}
            {{--<h4>Leave a Comment:</h4>--}}
            {{--{!! Form::open(['method'=>'POST','action' => 'CommentController@store']) !!}--}}
            {{--<input type="hidden" name="post_id" value="{{$post->id}}">--}}

            {{--<div class="form-group">--}}
                {{--{!!Form::textarea('body',null,['class'=>'form-control','rows'=> 3])!!}--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
                {{--{!! Form::submit('Submit ',['class'=>'btn btn-primary'])!!}--}}
            {{--</div>--}}
            {{--{!! Form::close() !!}--}}
        {{--</div>--}}
    {{--@endif--}}
    <hr>
    <!-- Posted Comments -->
   @if(Auth::check())
       <div id="disqus_thread"></div>
       <script>

           /**
            *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
            *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
           /*
           var disqus_config = function () {
           this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
           this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
           };
           */
           (function() { // DON'T EDIT BELOW THIS LINE
               var d = document, s = d.createElement('script');
               s.src = 'https://blog-d3fcqria7s.disqus.com/embed.js';
               s.setAttribute('data-timestamp', +new Date());
               (d.head || d.body).appendChild(s);
           })();
       </script>
       <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
       <script id="dsq-count-scr" src="//blog-d3fcqria7s.disqus.com/count.js" async></script>
   @endif
    <!-- Comment -->
    {{--@if($comments)--}}
        {{--@foreach($comments as $comment)--}}
            {{--@if($comment->is_active == 1)--}}
                {{--<div class="media">--}}
                    {{--<a class="pull-left" href="#">--}}
                        {{--<img class="media-object" height="64" src="{{'/'.$comment->photo}}" alt="">--}}
                    {{--</a>--}}
                    {{--<div class="media-body">--}}
                        {{--<h4 class="media-heading"> {{$comment->author}}--}}
                            {{--<small>{{$comment->created_at->toDayDateTimeString()}}</small>--}}
                        {{--</h4>--}}
                        {{--<p>{{$comment->body}}</p>--}}
                        {{--@if($comment->replies)--}}
                            {{--@foreach($comment->replies as $reply)--}}
                                {{--<div class=" media">--}}
                                    {{--<a class="pull-left" href="#">--}}
                                        {{--<img class="media-object" height="64" src="{{'/'.$reply->photo}}" alt="">--}}
                                    {{--</a>--}}
                                    {{--<div class="media-body">--}}
                                        {{--<h4 class="media-heading">{{$reply->author}}--}}
                                            {{--<small>{{$reply->created_at->toDayDateTimeString()}}</small>--}}
                                        {{--</h4>--}}
                                        {{--<p>{{$reply->body}}</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--@endforeach--}}
                            {{--{!! Form::open(['method'=>'POST','action' => 'ReplyController@store']) !!}--}}
                            {{--<input type="hidden" name="comment_id" value="{{$comment->id}}">--}}

                            {{--<div class="form-group">--}}
                                {{--{!!Form::textarea('body',null,['class'=>'form-control','rows'=> 1])!!}--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--{!! Form::submit('Submit ',['class'=>'btn btn-primary'])!!}--}}
                            {{--</div>--}}
                            {{--{!! Form::close() !!}--}}
                        {{--@endif--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--@endif--}}
        {{--@endforeach--}}
    {{--@endif--}}
    </div>
@stop


