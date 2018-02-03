<!doctype html>
<html lang="en" class="uk-offcanvas-page">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="uk-offcanvas-container">
    <div id="app">
        <main-component></main-component>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>