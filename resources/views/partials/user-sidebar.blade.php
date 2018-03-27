@if ($user->about)
<div class="panel panel-info">
    <h2>About</h2>
    <hr>
    <p>{{ $user->about }}</p>
</div>
@endif

@if ($user->website)
<div>
    <h2>Website</h2>
    <a href="http://{{ $user->website }}">{{ $user->website }}</a>
</div>
@endif

@if ($user->facebook || $user->twitter || $user->github)
<div>
    <h2>Get Social</h2>
    <ol class="list-unstyled">
        @if ($user->facebook)
        <li><a href="http://{{ $user->facebook }}">{{ $user->facebook }}</a></li>
        @endif
        @if ($user->twitter)
        <li><a href="http://{{ $user->twitter }}">{{ $user->twitter }}</a></li>
        @endif
        @if ($user->instagram)
        <li><a href="http://{{ $user->instagram }}">{{ $user->instagram }}</a></li>
        @endif
    </ol>
</div>

@endif