<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Global Risk Monitor</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

    <div class="container">

        <a class="navbar-brand fw-bold" href="#">
            🌍 Global Risk Monitor
        </a>

    </div>

</nav>

@yield('content')

</body>

</html>