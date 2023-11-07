<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Iceland Car Rental ▷ Cheapest Car Hire in Reykjavik Top❶ 2023</title>       
          
        <link href="/css/app.css" rel="stylesheet">
        <script src="{{ url(mix('js/app.js')) }}" defer></script>

        @livewireStyles

    </head>
    <body class="antialiased">

        @livewireScripts
        
        <h1 class="text-3xl font-bold underline text-red-500">
            Hello world!
        </h1>
        
        <div x-data="{ open: false }">
    <button @click="open = ! open">Toggle Content</button>
 
    <div x-show="open">
        Content...
    </div>
</div>
    </body>
</html>
