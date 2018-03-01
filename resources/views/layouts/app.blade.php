<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="css/app.css" rel="stylesheet">
    <link href="{{ asset('/css/toastr.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    @yield('Styles')
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
   <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>


        <div class="container">
            <div class="row" >
                @if(Auth::check())
                <div class="col-lg-3">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="/blog/public/home">Home</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('users') }}">Users</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('users.create') }}">Create New User</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('user.profile') }}">My Profile</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('categories') }}">Categories</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('tags') }}">Tags</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('posts') }}">All Posts</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('posts.trashed') }}">Trashed Post</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('post.create') }}">Create New Post</a>
                        </li>

                        <li class="list-group-item">
                            <a href="{{ route('category.create') }}">Create new Category</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('tag.create') }}">Create New Tag</a>
                        </li>
                    </ul>
                </div>
                @endif
                <div class="col-lg-8">
                    @yield('content')
                </div>
                {{--<div class="col-md-12">--}}
                    {{--<div class="row text-center">--}}
                       {{--<div class="col-md-4 col-md-offset-5 ">--}}
                           {{--@yield('content')--}}
                       {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>



    <!-- Scripts -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
   <script src="js/app.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js">

       </script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
   <script>

       @if(Session::has('success'))

          toastr.success("{{ Session::get('success') }}")

       @endif

       @if(Session::has('info'))

       {{--window.alert("{{ Session::get('info') }}");--}}
       toastr.info("{{ Session::get('info') }}")

       @endif
   </script>
      @yield('Scripts')
</body>
</html>
