<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Shop News</title>
    <meta name="description" content="Shop News">
    <meta name="author" content="okan">
    <meta name="robots" content="noindex, nofollow">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            color: black;
            background: grey;
        }
    </style>
</head>
<body class="antialiased">

@section('page-container-class', 'main-content-boxed')

<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <main class="main-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card">
                    @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>



@hasSection('page-js')
    @yield('page-js')
@endif

</body>
</html>
