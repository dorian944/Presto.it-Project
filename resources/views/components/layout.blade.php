<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? 'D^3F Solutions'}}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body >
    <x-navbar/>

        <div class="min-vh-10">
            {{ $slot }}
        </div>
    <x-footer/>
</body>
</html>