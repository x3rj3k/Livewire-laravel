<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
    <title>MY first Livewire</title>
    <livewire:styles />
    <livewire:scripts />
</head>

<body>
    <livewire:comments/>
    
    <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
</body>
</html>