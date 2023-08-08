<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }}</title>
    @vite('resources/sass/app.scss')
</head>

<body>
    <div id="preloader"></div>

    @include('layouts.nav')
    @yield('content')



    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="box">
                        <h3>address</h3>
                        <p>Jl. Kartini No.61/63, Kejaksan, Kec. Kejaksan, Kota Cirebon, Jawa Barat 45123</p>
                        <div class="share">
                            <a href="https://wa.me/6287730303063/?text=Hi%20mimin!%20Aku%20lihat%20dari%20Instagram,%20mau%20bertanya%20soal%20Gigiku%20..."
                                target="_blank" class="fab fa-whatsapp"></a>
                            <a href="https://www.instagram.com/gigiku.co/" target="_blank" class="fab fa-instagram"></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <h3>call us</h3>
                        <p>+62 8773 0303 063</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <h3>opening hours</h3>
                        <p>monday - friday : 07:30-20:00 <br> Saturday - Sunday :09:00-20:00</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="credit">created by <a href="https://www.instagram.com/gigiku.co/" target="_blank">gigiku</a> | all
            rights reserved!</div>
    </section>

    @vite('resources/js/app.js')
    @include('sweetalert::alert')
    @stack('scripts')
</body>

</html>
