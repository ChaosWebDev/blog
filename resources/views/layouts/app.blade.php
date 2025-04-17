<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="{{ $theme ?? 'dark' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name') }}</title>

    {{-- NERDFONT --}}
    <link rel="stylesheet" href="https://www.nerdfonts.com/assets/css/webfont.css">

    {{-- VITE --}}
    @vite(['resources/scripts/app.js'])
    @vite(['resources/styles/app.scss'])
</head>

<body>
    {{ $slot }}
</body>

</html>
