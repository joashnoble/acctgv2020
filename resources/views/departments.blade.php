<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' } </script>
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" >
        <title>Larticles</title>
    </head>
    <body>
        <div id="app">
            <navbar></navbar>
            <div class="container">
                {{-- <departments></departments> --}}
                <categories></categories>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
   
</body>
</html>
