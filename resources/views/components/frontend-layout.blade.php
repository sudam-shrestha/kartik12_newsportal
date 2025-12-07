<!DOCTYPE html>
<html lang="en">
@props(['title', 'image', 'keywords', 'description'])

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News Portal | {{ $title ?? '' }}</title>

    <meta name="keywords" content="{{ $keywords ?? '' }}">
    <meta name="description" content="{{ $description ?? '' }}">

    <meta property="og:title" content="{{ $title ?? '' }}" />
    <meta property="og:image" content="{{ $image ?? '' }}" />
    <meta property="og:description" content="{{ $description ?? '' }}" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
</head>

<body>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v24.0&appId=APP_ID"></script>

    <x-frontend-header />


    <main>
        {{ $slot }}
    </main>


    <footer></footer>

</body>

</html>
