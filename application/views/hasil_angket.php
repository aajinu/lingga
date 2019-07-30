
<!doctype html>
<!--[if lte IE 9]>     <html lang="en" class="no-focus lt-ie10 lt-ie10-msg"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <title>Codebase - Bootstrap 4 Admin Template &amp; UI Framework</title>

        <meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
        <meta property="og:site_name" content="Codebase">
        <meta property="og:description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="<?= base_url('assets/admin/') ?>img/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('assets/admin/') ?>img/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/admin/') ?>img/favicons/apple-touch-icon-180x180.png">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>js/plugins/datatables/dataTables.bootstrap4.min.css">

        <!-- Codebase framework -->
        <link rel="stylesheet" id="css-main" href="<?= base_url('assets/admin/') ?>css/codebase.min.css">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="<?= base_url('assets/admin/') ?>css/themes/flat.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body>
        <!-- Page Container -->
        <!--
            Available classes for #page-container:

        GENERIC

            'enable-cookies'                            Remembers active color theme between pages (when set through color theme helper Codebase() -> uiHandleTheme())

        SIDEBAR & SIDE OVERLAY

            'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
            'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
            'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
            'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
            'sidebar-inverse'                           Dark themed sidebar

            'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
            'side-overlay-o'                            Visible Side Overlay by default

            'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

        HEADER

            ''                                          Static Header if no class is added
            'page-header-fixed'                         Fixed Header

        HEADER STYLE

            ''                                          Classic Header style if no class is added
            'page-header-modern'                        Modern Header style
            'page-header-inverse'                       Dark themed Header (works only with classic Header style)
            'page-header-glass'                         Light themed Header with transparency by default
                                                        (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
            'page-header-glass page-header-inverse'     Dark themed Header with transparency by default
                                                        (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

        MAIN CONTENT LAYOUT

            ''                                          Full width Main Content if no class is added
            'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
            'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
        -->
        <div id="page-container" class="sidebar-o sidebar-inverse side-scroll page-header-modern main-content-boxed">
            <!-- Side Overlay-->
            <aside id="side-overlay">
                <!-- Side Overlay Scroll Container -->
                <div id="side-overlay-scroll">
                    <!-- Side Header -->
                    <div class="content-header content-header-fullrow">
                        <div class="content-header-section align-parent">
                            <!-- Close Side Overlay -->
                            <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                            <button type="button" class="btn btn-circle btn-dual-secondary align-v-r" data-toggle="layout" data-action="side_overlay_close">
                                <i class="fa fa-times text-danger"></i>
                            </button>
                            <!-- END Close Side Overlay -->

                            <!-- User Info -->
                            <div class="content-header-item">
                                <a class="img-link mr-5" href="be_pages_generic_profile.html">
                                    <img class="img-avatar img-avatar32" src="<?= base_url('assets/admin/') ?>img/avatars/avatar15.jpg" alt="">
                                </a>
                                <a class="align-middle link-effect text-primary-dark font-w600" href="be_pages_generic_profile.html">John Smith</a>
                            </div>
                            <!-- END User Info -->
                        </div>
                    </div>
                    <!-- END Side Header -->

                    <!-- Side Content -->
                    <div class="content-side">
                        <!-- Search -->
                        <div class="block pull-t pull-r-l">
                            <div class="block-content block-content-full block-content-sm bg-body-light">
                                <form action="be_pages_generic_search.html" method="post">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="side-overlay-search" name="side-overlay-search" placeholder="Search..">
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-secondary px-10">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- END Search -->

                        <!-- Mini Stats -->
                        <div class="block pull-r-l">
                            <div class="block-content block-content-full block-content-sm bg-body-light">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="font-size-sm font-w600 text-uppercase text-muted">Clients</div>
                                        <div class="font-size-h4">460</div>
                                    </div>
                                    <div class="col-4">
                                        <div class="font-size-sm font-w600 text-uppercase text-muted">Sales</div>
                                        <div class="font-size-h4">728</div>
                                    </div>
                                    <div class="col-4">
                                        <div class="font-size-sm font-w600 text-uppercase text-muted">Earnings</div>
                                        <div class="font-size-h4">$7,860</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Mini Stats -->

                        <!-- Friends -->
                        <div class="block pull-r-l">
                            <div class="block-header bg-body-light">
                                <h3 class="block-title"><i class="fa fa-fw fa-users font-size-default mr-5"></i>Friends</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                        <i class="si si-refresh"></i>
                                    </button>
                                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                                </div>
                            </div>
                            <div class="block-content">
                                <ul class="nav-users push">
                                    <li>
                                        <a href="be_pages_generic_profile.html">
                                            <img class="img-avatar" src="<?= base_url('assets/admin/') ?>img/avatars/avatar6.jpg" alt="">
                                            <i class="fa fa-circle text-success"></i> Laura Carr
                                            <div class="font-w400 font-size-xs text-muted">Photographer</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="be_pages_generic_profile.html">
                                            <img class="img-avatar" src="<?= base_url('assets/admin/') ?>img/avatars/avatar10.jpg" alt="">
                                            <i class="fa fa-circle text-success"></i> Jose Mills
                                            <div class="font-w400 font-size-xs text-muted">Web Designer</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="be_pages_generic_profile.html">
                                            <img class="img-avatar" src="<?= base_url('assets/admin/') ?>img/avatars/avatar3.jpg" alt="">
                                            <i class="fa fa-circle text-warning"></i> Marie Duncan
                                            <div class="font-w400 font-size-xs text-muted">UI Designer</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="be_pages_generic_profile.html">
                                            <img class="img-avatar" src="<?= base_url('assets/admin/') ?>img/avatars/avatar10.jpg" alt="">
                                            <i class="fa fa-circle text-danger"></i> Albert Ray
                                            <div class="font-w400 font-size-xs text-muted">Copywriter</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- END Friends -->

                        <!-- Activity -->
                        <div class="block pull-r-l">
                            <div class="block-header bg-body-light">
                                <h3 class="block-title">
                                    <i class="fa fa-fw fa-clock-o font-size-default mr-5"></i>Activity
                                </h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                        <i class="si si-refresh"></i>
                                    </button>
                                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                                </div>
                            </div>
                            <div class="block-content">
                                <ul class="list list-activity">
                                    <li>
                                        <i class="si si-wallet text-success"></i>
                                        <div class="font-w600">+$29 New sale</div>
                                        <div>
                                            <a href="javascript:void(0)">Admin Template</a>
                                        </div>
                                        <div class="font-size-xs text-muted">5 min ago</div>
                                    </li>
                                    <li>
                                        <i class="si si-close text-danger"></i>
                                        <div class="font-w600">Project removed</div>
                                        <div>
                                            <a href="javascript:void(0)">Best Icon Set</a>
                                        </div>
                                        <div class="font-size-xs text-muted">26 min ago</div>
                                    </li>
                                    <li>
                                        <i class="si si-pencil text-info"></i>
                                        <div class="font-w600">You edited the file</div>
                                        <div>
                                            <a href="javascript:void(0)">
                                                <i class="fa fa-file-text-o"></i> Docs.doc
                                            </a>
                                        </div>
                                        <div class="font-size-xs text-muted">3 hours ago</div>
                                    </li>
                                    <li>
                                        <i class="si si-plus text-success"></i>
                                        <div class="font-w600">New user</div>
                                        <div>
                                            <a href="javascript:void(0)">StudioWeb - View Profile</a>
                                        </div>
                                        <div class="font-size-xs text-muted">5 hours ago</div>
                                    </li>
                                    <li>
                                        <i class="si si-wrench text-warning"></i>
                                        <div class="font-w600">App v5.5 is available</div>
                                        <div>
                                            <a href="javascript:void(0)">Update now</a>
                                        </div>
                                        <div class="font-size-xs text-muted">8 hours ago</div>
                                    </li>
                                    <li>
                                        <i class="si si-user-follow text-pulse"></i>
                                        <div class="font-w600">+1 Friend Request</div>
                                        <div>
                                            <a href="javascript:void(0)">Accept</a>
                                        </div>
                                        <div class="font-size-xs text-muted">1 day ago</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- END Activity -->

                        <!-- Profile -->
                        <div class="block pull-r-l">
                            <div class="block-header bg-body-light">
                                <h3 class="block-title">
                                    <i class="fa fa-fw fa-pencil font-size-default mr-5"></i>Profile
                                </h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                                </div>
                            </div>
                            <div class="block-content">
                                <form action="be_pages_dashboard.html" method="post" onsubmit="return false;">
                                    <div class="form-group mb-15">
                                        <label for="side-overlay-profile-name">Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="side-overlay-profile-name" name="side-overlay-profile-name" placeholder="Your name.." value="John Smith">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group mb-15">
                                        <label for="side-overlay-profile-email">Email</label>
                                        <div class="input-group">
                                            <input type="email" class="form-control" id="side-overlay-profile-email" name="side-overlay-profile-email" placeholder="Your email.." value="john.smith@example.com">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group mb-15">
                                        <label for="side-overlay-profile-password">New Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="side-overlay-profile-password" name="side-overlay-profile-password" placeholder="New Password..">
                                            <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group mb-15">
                                        <label for="side-overlay-profile-password-confirm">Confirm New Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="side-overlay-profile-password-confirm" name="side-overlay-profile-password-confirm" placeholder="Confirm New Password..">
                                            <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-block btn-alt-primary">
                                                <i class="fa fa-refresh mr-5"></i> Update
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- END Profile -->

                        <!-- Settings -->
                        <div class="block pull-r-l">
                            <div class="block-header bg-body-light">
                                <h3 class="block-title">
                                    <i class="fa fa-fw fa-wrench font-size-default mr-5"></i>Settings
                                </h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                                </div>
                            </div>
                            <div class="block-content">
                                <div class="row gutters-tiny">
                                    <div class="col-6">
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="side-overlay-settings-status" name="side-overlay-settings-status" value="1" checked>
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Online Status</span>
                                            </label>
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="side-overlay-settings-public-profile" name="side-overlay-settings-public-profile" value="1">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Public Profile</span>
                                            </label>
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="side-overlay-settings-notifications" name="side-overlay-settings-notifications" value="1" checked>
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Notifications</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="side-overlay-settings-updates" name="side-overlay-settings-updates" value="1">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Auto updates</span>
                                            </label>
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="side-overlay-settings-api-access" name="side-overlay-settings-api-access" value="1" checked>
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">API Access</span>
                                            </label>
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="side-overlay-settings-limit-requests" name="side-overlay-settings-limit-requests" value="1">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">API Requests</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Settings -->
                    </div>
                    <!-- END Side Content -->
                </div>
                <!-- END Side Overlay Scroll Container -->
            </aside>
            <!-- END Side Overlay -->

            <!-- Sidebar -->
            <!--
                Helper classes

                Adding .sidebar-mini-hide to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
                Adding .sidebar-mini-show to an element will make it visible (opacity: 1) when the sidebar is in mini mode
                    If you would like to disable the transition, just add the .sidebar-mini-notrans along with one of the previous 2 classes

                Adding .sidebar-mini-hidden to an element will hide it when the sidebar is in mini mode
                Adding .sidebar-mini-visible to an element will show it only when the sidebar is in mini mode
                    - use .sidebar-mini-visible-b if you would like to be a block when visible (display: block)
            -->
            <nav id="sidebar">
                <!-- Sidebar Scroll Container -->
                <div id="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <div class="sidebar-content">
                        <!-- Side Header -->
                        <div class="content-header content-header-fullrow px-15">
                            <!-- Mini Mode -->
                            <div class="content-header-section sidebar-mini-visible-b">
                                <!-- Logo -->
                                <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                                    <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                                </span>
                                <!-- END Logo -->
                            </div>
                            <!-- END Mini Mode -->

                            <!-- Normal Mode -->
                            <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                                <!-- Close Sidebar, Visible only on mobile screens -->
                                <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                                <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                                    <i class="fa fa-times text-danger"></i>
                                </button>
                                <!-- END Close Sidebar -->

                                <!-- Logo -->
                                <?php include "logo.php";?>
                                <!-- END Logo -->
                            </div>
                            <!-- END Normal Mode -->
                        </div>
                        <!-- END Side Header -->

                        <!-- Side User -->
                        <?php include "side_user.php";?>
                        <!-- END Side User -->

                        <!-- Side Navigation -->
                        <?php include "sidebar.php";?>
                        <!-- END Side Navigation -->
                    </div>
                    <!-- Sidebar Content -->
                </div>
                <!-- END Sidebar Scroll Container -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <?php include "header.php";?>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">

            <div class="content">
                <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Pilih Kelas</h3>                            
                </div>
                <div class="block-content">
                <form action="<?= base_url('welcome/ambil_kelas'); ?>" method="post">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="form-group row">
                    <!-- <label class="col-lg-2 col-form-label" style="text-align:right;" for="nama">Kelas</label> -->
                    <div class="col-lg-10">
                    
                    <!-- <button type="submit" class="btn btn-alt-primary">Tampil</button>     -->
                    <select class="form-control" name="kelas" required="true">
                        <option value="none" selected="" disabled="">Pilih Salah Satu</option>
                        <?php foreach ($kelas as $k): ?>   
                        <option value="<?= $k->kelas ?>"><?= $k->kelas ?></option>
                        <?php endforeach ?>
                    </select>
                    </div>
                    <div class="col-lg-2">
                    <button type="submit" class="btn btn-alt-primary">Tampil</button>    
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <div class="col-lg-10 ml-auto">
                        <button type="submit" class="btn btn-alt-primary">Tampil</button>
                    </div>
                </div> -->
                </form>
               </div>
                </div>
         
                <!-- Page Content -->
                
                <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Hasil</h3>                            
                </div>
                <div class="block-content">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama</th>
                            <th>Nilai Pribadi</th>
                            <th>Nilai Sosial</th>
                            <th>Nilai Belajar</th>
                            <th>Nilai Karir</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no=0;
                    $nilai1=0;
                    $nilai2=0;
                    $nilai3=0;
                    $nilai4=0;
                    foreach($siswa as $s){
                    $nilai1+=$s->nilai1;
                    $nilai2+=$s->nilai2;
                    $nilai3+=$s->nilai3;
                    $nilai4+=$s->nilai4;
                    $no++
                    ?>
                        <tr>
                            <td class="text-center"><?= $no; ?></td>
                            <td class="font-w600"><?= $s->nama ?></td>
                            <td class="font-w600"><?= $s->nilai1 ?></td>
                            <td class="font-w600"><?= $s->nilai2 ?></td>
                            <td class="font-w600"><?= $s->nilai3 ?></td>
                            <td class="font-w600"><?= $s->nilai4 ?></td>
                    <?php } ?>
                    </tbody>                   
                </table>
                </div>
                </div>

                <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Kesimpulan Angket Kelas <?= $kodekelas ?></h3>                            
                </div>
                <div class="block-content">
                <label class="col-lg-4 col-form-label" for="nama">Pribadi   = <?= $nilai1 ?></label>
                <label class="col-lg-4 col-form-label" for="nama">Sosial    = <?= $nilai2 ?></label>
                <label class="col-lg-4 col-form-label" for="nama">Belajar   = <?= $nilai3 ?></label>
                <label class="col-lg-4 col-form-label" for="nama">Karir     = <?= $nilai4 ?></label>
                </div>
                </div>
            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer" class="opacity-0">
                <div class="content py-20 font-size-xs clearfix">
                    <div class="float-right">
                        Crafted with <i class="fa fa-heart text-pulse"></i> by <a class="font-w600" href="http://goo.gl/vNS3I" target="_blank">pixelcave</a>
                    </div>
                    <div class="float-left">
                        <a class="font-w600" href="https://goo.gl/po9Usv" target="_blank">Codebase 1.3</a> &copy; <span class="js-year-copy">2017</span>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        <!-- Codebase Core JS -->
        <script src="<?= base_url('assets/admin/') ?>js/core/jquery.min.js"></script>
        <script src="<?= base_url('assets/admin/') ?>js/core/popper.min.js"></script>
        <script src="<?= base_url('assets/admin/') ?>js/core/bootstrap.min.js"></script>
        <script src="<?= base_url('assets/admin/') ?>js/core/jquery.slimscroll.min.js"></script>
        <script src="<?= base_url('assets/admin/') ?>js/core/jquery.scrollLock.min.js"></script>
        <script src="<?= base_url('assets/admin/') ?>js/core/jquery.appear.min.js"></script>
        <script src="<?= base_url('assets/admin/') ?>js/core/jquery.countTo.min.js"></script>
        <script src="<?= base_url('assets/admin/') ?>js/core/js.cookie.min.js"></script>
        <script src="<?= base_url('assets/admin/') ?>js/codebase.js"></script>

        <!-- Page JS Plugins -->
        <script src="<?= base_url('assets/admin/') ?>js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url('assets/admin/') ?>js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="<?= base_url('assets/admin/') ?>js/plugins/ckeditor/ckeditor.js"></script>
        <!-- Page JS Code -->
        <script src="<?= base_url('assets/admin/') ?>js/pages/be_tables_datatables.js"></script>
        <script>
            jQuery(function () {
                // Init page helpers (Summernote + CKEditor + SimpleMDE plugins)
                Codebase.helpers(['summernote', 'ckeditor', 'simplemde']);
            });
        </script>
    </body>
</html>
