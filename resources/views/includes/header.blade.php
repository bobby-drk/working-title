<nav class="navbar navbar-default navbar-static-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">{{ config('app.site_name') }} </a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="{{ CustomHelpers::isActiveRoute('home') }}"><a href="/">Home</a></li>
        <!-- <li><a href="/">Home</a></li> -->

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="{{ CustomHelpers::isActiveRoute('profile') }}"><a href="/profile">Profile</a></li>
        <li><a href="/login">Login</a></li>
      </ul>
    </div>
  </div>
</nav>