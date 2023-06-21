<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
      @include('admin.partials.header')

      <main class="d-flex">
        @auth
          @include('admin.partials.menu')
        @endauth

        <div class="ds-dash w-100">
          @yield('content')
        </div>
      </main>
    </div>
</body>

</html>
