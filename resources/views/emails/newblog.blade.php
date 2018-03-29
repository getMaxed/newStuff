<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email from newstuff.com</title>
</head>
<body style="padding: 0 10%;">
    <h1 style="text-align: center; background-color: #eee; color: #737373; padding: 0"></h1>

    <blockquote>
        <h2>Hi {{ $user->name }}!</h2>
        <h3>A new blog <a href="{{ action('BlogController@show', [$blog->slug]) }}">{{ $blog->title }}</a>has been posted on <strong>newstuff.com</strong></h3>
        <h4>Category: @foreach ($blog->category as $category) <span><a href="{{ route('categories.show', $category->slug) }}"><strong>{{ $category->name }}</strong></a></span> @endforeach</h4>

        <p><a href="{{ action('BlogController@show', [$blog->slug]) }}">Read full article ..</a></p>
    </blockquote>
    <h5 style="text-align: center; background-color: #eee; color: #737373; padding: 0">Thank you for being a part of the community!</h5>

</body>
</html>