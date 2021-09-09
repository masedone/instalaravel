<div class="container-avatar">
    @if(Auth::user()->image)
    <img class="avatar" src="{{ route('user.avatar',['filename'=>Auth::user()->image]) }}" />
    @endif
</div>
