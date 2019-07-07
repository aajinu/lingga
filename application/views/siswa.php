<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BasketBall || Home</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url(''); ?>css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="<?= base_url(''); ?>css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="<?= base_url(''); ?>css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="<?= base_url(''); ?>css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="<?= base_url(''); ?>css/flaticon.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="<?= base_url(''); ?>css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="<?= base_url(''); ?>css/swiper.min.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="<?= base_url(''); ?>css/style.css">
</head>

<body>
    <!--::header part start::-->
    <header class="header_area">
    <img src="<?= base_url(''); ?>img/header.png" width="1350px" height="160px">
        <div class="copyright_part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link active" href="<?= base_url('welcome/siswa'); ?>" style="color:#FF8C00; font-size:18px;">Home</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link active" href="<?= base_url('welcome/angket'); ?>" style="color:#FF8C00; font-size:18px;">Angket</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link active" href="<?= base_url(''); ?>" style="color:#FF8C00; font-size:18px;">Logout</a>
                                    </li>
                                </ul>
                                
                            </div>
                        </nav>
                        <div class="header_social_icon d-block d-lg-none">
                            <ul>
                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                <li>
                                    <a href="#"> <i class="ti-twitter"></i></a>
                                </li>
                                <li><a href="#"><i class="ti-instagram"></i></a></li>
                                <li><a href="#"><i class="ti-skype"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

   <section id="content">
  <div class="container">
    <div class="row">
	  </div>
<!--slider-->
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="middle_content">
        <?php foreach ($profil as $p): ?>
			<br><h3><center><b>Profil Sekolah</b></center></h3>
<br>
<?= $p->profil ?>
<br>
<h3><center><b>Visi</b></center></h3><br>
<center><?= $p->visi ?></center>
<br>
<h3><center><b>Misi</b></center></h3><br>
<?= $p->misi ?>
<?php endforeach ?>
      </div>
    </div>
   </div>
</div>
</section><br><br><br><br>

    
    <!-- about part start-->

    <!-- upcoming_event part start-->
    
    <footer class="copyright_part">
        <div class="container">
            <div class="row align-items-center">
                <p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                
            </div>
        </div>
    </footer>
    <!-- footer part end-->

    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="<?= base_url(''); ?>js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="<?= base_url(''); ?>js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="<?= base_url(''); ?>js/bootstrap.min.js"></script>
    <!-- aos js -->
    <script src="<?= base_url(''); ?>js/aos.js"></script>
    <!-- easing js -->
    <script src="<?= base_url(''); ?>js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="<?= base_url(''); ?>js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="<?= base_url(''); ?>js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="<?= base_url(''); ?>js/owl.carousel.min.js"></script>
    <!-- carousel js -->
    <script src="<?= base_url(''); ?>js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="<?= base_url(''); ?>js/swiper_custom.js"></script>
    <!-- custom js -->
    <script src="<?= base_url(''); ?>js/custom.js"></script>



</body>

</html>