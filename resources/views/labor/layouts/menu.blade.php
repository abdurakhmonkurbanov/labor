<div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
      <div class="align-items-center d-none d-md-flex">
        <i class="bi bi-calendar2-plus"></i>
        <?php
            $mydate=getdate(date("U"));
            echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
        ?>
      </div>
      <div class="d-flex align-items-center">
        <i class="bi bi-alarm"></i>
        <?php

            echo(date("h:i"));
        ?>

        &nbsp; &nbsp; &nbsp; &nbsp;
        <i class="bi bi-phone"></i> Tel  +998 99 472 76 71
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
          <li><a class="nav-link scrollto " href="{{route('index')}}"> Registratsiya <i class="bi bi-person-plus"></i></a></li>
          <li><a class="nav-link scrollto " href="{{route('resultindex')}}">Natijalarni kiritish <i class="bi bi-check2-circle"></i></a></li>
          <li><a class="nav-link scrollto " href="{{route('resultprint')}}">Natijalarni chop etish <i class="bi bi-printer"></i></a></li>
          <li class="dropdown"><a class="nav-link scrollto" href="#">Reaktivlar   <i class="bi bi-chevron-down"></i></a>
        <ul>
            <li><a class="nav-link scrollto" href="{{route('reaktiv')}}">Kirim/Chiqim</a></li>
            <li><a class="nav-link scrollto" href="{{route('report.index')}}">Hisobot</a></li>
        </ul>

        </li>
        <li><a class="nav-link scrollto " href="{{route('archive.index')}}">Arxiv<i class="bi bi-search"></i></a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
