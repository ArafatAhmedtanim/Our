<style type="text/css">

.navbar{
  top:5%;
  left:5%;
  right: 5%;
  opacity: .8;
  background-color:  #ffd9b3;
  -webkit-box-shadow: 0 8px 6px -4px #595959;
  -moz-box-shadow: 0 8px 6px -4px #595959;
  box-shadow: 0 8px 6px -4px #595959;
}

.nav-link{
  color: black;
}

.nav-link:hover { 
}

.nav-link:active { 
}


.nav-item:hover{
  background-color: #996633;
  -webkit-box-shadow: 0 0 5px #000000; 
  -moz-box-shadow:  0 0 5px #000000; 
  box-shadow:  0 0 5px #000000;
}

.navbar-brand{
  color: black;
}

.navbar-brand:hover { 
    text-shadow: 1px 1px white;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #ffd9b3;
    min-width: 160px;
    -webkit-box-shadow: 0 0 8px #000000; 
    -moz-box-shadow:  0 0 8px #000000; 
    box-shadow:  0 0 8px #000000;
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
  background-color: #996633;
}

.dropdown:hover .dropdown-content {
    display: block;
}

</style>




<nav class="navbar navbar-expand-lg navbar-light fixed-top">
  <div class="container">
    @if(isset($page_name))
    <a class="navbar-brand" href="#" onclick="myFunction()">{{strtoupper($page_name)}}</a>
    @else
    <a class="navbar-brand" href="#">OUR JOURNEY</a>
    @endif
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        @guest
        <li class="nav-item dropdown">
          <a class="nav-link" href="#">Login</a>
          <div class="dropdown-content">
             @include('auth.login')
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#">{{ __('Register') }}</a>
          <div class="dropdown-content">
             @include('auth.register')
          </div>
        </li>
        @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-content">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
        @endguest
        <li class="nav-item">
          <a class="nav-link" href="/ourjourney">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#">Our Tour</a>
          <div class="dropdown-content">
            @foreach($countries as $country)
            <a class="nav-link" href="/ourtour/{{$country->id}}">{{$country->name}}</a>
            @endforeach
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>

