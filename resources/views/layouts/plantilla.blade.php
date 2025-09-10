<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    @include('layouts.styles')

</head>
<body>

  @include('layouts.navbar')

    <div class="container">
      @yield('content')
    </div>

  @include('layouts.scripts')

  @yield('scripts')

</body>
</html>