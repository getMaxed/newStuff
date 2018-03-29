<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>You have received a new message from {{ $name }}</h1>
    <blockquote>
        <h2>{{ $email }}</h2>
        <h3>Subject:</h3>
        <p>{{ $subject }}</p>
        <p>{{ $mail_message }}</p>

    </blockquote>
    <h5>This message has been sent to you using Contact Form at newstuff.com</h5>
</body>
</html>

{{--@if (Session::has('flash_message'))--}}
    {{--<div class="alert alert-success">--}}
        {{--{{ Session::get('flash_message') }}--}}
        {{--<button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--}}
    {{--</div>--}}
{{--@endif--}}