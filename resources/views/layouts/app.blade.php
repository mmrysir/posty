<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>posty</title>
<link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body class="bg-gray-200">
  <nav class="p-6 bg-white flex justify-between mb-6">
      <ul class="flex item-center">
          <li>
              <a href="/" class="p-3">Home</a>
          </li>
          <li>
              <a href="{{route('dashboard')}}" class="p-3">dashboard</a>
          </li>

          <li>
              <a href="{{route('posts')}}" class="p-3">post</a>
          </li>
      </ul>
      <ul class="flex item-center">
          @auth
              <li>
                  <a href="@" class="p-3">{{auth()->user()->name}} </a>
              </li>
              <li>
                  <form action="{{route('logout')}}" method="post" class="p-3 inline">
                      @csrf
                      <button  type="submit">logout</button>
                  </form>
              </li>
          @endauth
          @guest
              <li>
                  <a href="{{route('login')}}" class="p-3">login</a>
              </li>

              <li>
                  <a href="{{route('register')}}" class="p-3">register</a>
              </li>
              @endguest
      </ul>
  </nav>
  @yield('content')


  </body>
</html>

