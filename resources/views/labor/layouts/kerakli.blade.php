<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Laboratoriya </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/assets/img/logo.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Local Fonts -->
  <link rel="stylesheet" href="/assets/css/fonts/css" class="href">
  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medicio - v4.7.0
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
      <div class="align-items-center d-none d-md-flex">
        <i class="bi bi-clock"></i> Monday - Saturday, 8AM to 10PM
      </div>
      <div class="d-flex align-items-center">
        <i class="bi bi-phone"></i> Call us now +1 5589 55488 55
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="/" class="logo me-auto"><img src="/assets/img/logo.png" alt="">Darmon-Service</a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <h1 class="logo me-auto"><a href="index.html">Medicio</a></h1> -->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active " href="#">Registratsiya</a></li>
          <li><a class="nav-link scrollto " href="#">Natijalarni kiritish</a></li>
          <li><a class="nav-link scrollto " href="#">Natijalarni chop etish</a></li>
          <li><a class="nav-link scrollto" href="#">Reaktivlar (Kirim/Chiqim)</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

<br><br><br>
  <main id="main">
    <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
            <?php
               if($res == 'status')
               {
                   echo "Ma`lumotlar saqlandi!";
               }
               if($res == 'noanal')
               {
                   echo "Analiz belgilanmadi";
               }

            ?>
          <h3>Ro'yxatga olish</h3>
        </div>

        <form action="{{route('reg')}}" method="post">
            @csrf
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="fio" class="form-control" id="name" placeholder="Familiya Ism Otasining ismi" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="ty" class="form-control" name="ty" id="email" placeholder="Tug'ilgan yili" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 form-group m-3 text-center">
              <b>Analizlarni belgilang</b>
            </div>
            <div style="height: 300px" class="col-md-8 form-group mt-3 overflow-auto border  border-primary">
                @foreach ($anals as $item)
                    <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="control-input" name="anal{{$item->id}}" id="anal{{$item->id}}">
                        <label class="control-label m-2" for="anal{{$item->id}}">
                            {{$item->name}}
                        </label>
                    </div>
                @endforeach

            </div>
          </div>
          <div class="row">
              <div class="col text-center mt-3">
                  <input class="btn btn-primary" type="submit" value="Saqlash"></div>
          </div>
        </form>
      </div>
    </section><!-- End Appointment Section -->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h3>Bugungi Analizlar</h3>
                    </div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col" width="10%">Tartib raqam</th>
                            <th scope="col" width="25%">FIO</th>
                            <th scope="col" width="55%">Analizlar</th>
                            <th scope="col" width="10%">Vaqti</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $item)
                          <tr>
                            <th scope="row"> {{$item->tartib_raqami}} </th>
                            <td> {{$item->fio}} </td>
                            <td>
                            <?php
                            $a_ids = $item->analiz_ids;
                            $a_ids = explode(":",$a_ids);
                                foreach ($a_ids as  $value) {
                                    $i = 1;
                                   ?>
                                        @foreach ($anals as $item)

                                            @if ($item->id == $value)
                                             {{$item->name}} <br>

                                            @endif
                                        @endforeach
                                   <?php

                                }
                            ?>
                            </td>
                            <td>
                                <?php
                                    $timestamp = $item->created_at;
                                    $datetime = explode(" ",$timestamp);
                                    $date = $datetime[0];
                                    $time = $datetime[1];
                                    echo($time);
                                ?>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container">
      <div class="credits">
        Created by <a href="mailto:abduraxmon.1986@gmail.com">Mr.Kurbanov</a>
      Tel: +998 (99) 472-76-71</div>

    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/purecounter/purecounter.js"></script>
  <script src="/assets/vendor/aos/aos.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>

</body>

</html>
