<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Teste Phenon">
    <meta name="author" content="João Antonio Gardin Vieira">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Teste Phenon - @yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
    <link href="/libs/fontawesome-free-5.14.0-web/css/all.min.css" rel="stylesheet">
    <!-- Estilos customizados para esse template -->
    <link href="/css/dashboard.css" rel="stylesheet">

    @yield('styles')
</head>

<body>
    <nav class="navbar bg-color-1">
        <div class="container">
            <h1 class="h3"><a class="navbar-brand" href="/">@yield('title')</a></h1>
    </div>
    </nav>
    <main role="main" class="main">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif

        @if (session('statusError'))
        <div class="alert alert-danger">
            {{ session('statusError') }}
        </div>
        @endif
        @yield('content')
    </main>
    <footer class="footer bg-color-1">
        <div class="container">
        </div>
    </footer>
    <!-- Principal JavaScript 
    ================================================== -->
    <script src="/libs/jQuery/jquery-3.5.1.min.js"></script>
    <script src="/libs/jQuery/jquery.mask.min.js"></script>
    <script src="/libs/jQuery/jquery-validation-1.19.2/dist/jquery.validate.min.js"></script>
    <script src="/libs/jQuery/jquery-validation-1.19.2/dist/additional-methods.min.js"></script>
    <script src="/libs/jQuery/jquery-validation-1.19.2/dist/localization/messages_pt_PT.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="/js/app.js"></script>
    @yield('scripts')
</body>

</html>