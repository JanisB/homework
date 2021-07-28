<h2>Welcome {{ Auth::user()->name }}</h2>
<br>
@if(Auth::user()->avatar)
<img src="{{ Auth::user()->avatar }}" style="width:230px;">
@endif
<br>
<a href="{{ route('admin.index') }}">Admin</a>
<br>
<a href="{{ route('logout') }}">Logout</a>