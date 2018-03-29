@extends('layouts.app')
@section('content')

@include('partials.meta-dynamic')

    <main class="container">

        <div class="container-fluid">
            <article>
                <div class="col-sm-12">
                    @if($blog->photo)
                            <img style="margin: 0 auto; padding-bottom: 20px" class=" img-responsive featured_image" src="/images/{{ $blog->photo ? $blog->photo->photo : '' }}">
                    @endif
                </div>
                <div class="jumbotron">
                    <h1>{{ $blog->title }}</h1>
                    @if (Auth::user() ? Auth::user()->role_id === 1 || Auth::user()->id === $blog->user_id : '')<a style="float: right;" href="{{ action('BlogController@edit', [$blog->id]) }}">Edit</a>@endif
                </div>
                <div class="col-sm-8 col-sm-offset-2">
                    <p>{!! $blog->body !!}</p>
                    @foreach($blog->category as $category)
                        <p><a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a></p>
                    @endforeach
                </div>

                <div>
                    <div id="disqus_thread"></div>
                    <script>

                        (function() {
                            var d = document, s = d.createElement('script');
                            s.src = 'https://newstuff-1.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                        })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

                </div>

            </article>
        </div>

    </main>
    <script id="dsq-count-scr" src="//newstuff-1.disqus.com/count.js" async></script>





@endsection