@if (!auth()->check())
<div id="Login">
    <a href="/login">anmelden</a>
</div>
@else
    <div id='Login'>
    <form method="POST" action="/logout">
        @csrf
        <input type="submit" value="abmelden"></input>
    </form>
    </div>
@endif
