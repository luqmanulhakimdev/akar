<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?= base_url('assets/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
<!--        <link href="https://raw.githubusercontent.com/samrayner/bootstrap-side-navbar/gh-pages/assets/stylesheets/navbar-fixed-side.css" rel="stylesheet" />-->
        <link href="https://v4-alpha.getbootstrap.com/examples/dashboard/dashboard.css" rel="stylesheet" />
        <link href="https://v4-alpha.getbootstrap.com/examples/sticky-footer-navbar/sticky-footer-navbar.css" rel="stylesheet" />      
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!--
        <script>
    $(function(){
        $( "#accordion" ).accordion({
            collapsible: true
        });
    });
</script>
-->
        
        <link rel="icon" href="<?= base_url('assets/icon/akar.ico'); ?>">
        <title>AKAR</title>
    </head>
    
    <body style="padding-top: 70px;">
    
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="" class="navbar-brand">
                    <img src="<?= base_url('assets/icon/akar.ico'); ?>" alt="Brand" class="img-responsive img-circle" style="display:inline-block; margin-top:-5px; margin-right: 7px;">AKAR
                    </a>
                </div>
                
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <?php if($this->session->has_userdata('user_id')): ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Data absen <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= site_url('data_absen'); ?>">Data absensi</a></li>
                                <?php if($this->session->userdata('user_status') === 'karyawan'): ?>
                                    <?php if($this->session->userdata('absen_masuk') === TRUE): ?>
                                        <li><a href="<?= site_url('absen_pulang'); ?>">Absen pulang</a></li>
                                    <?php elseif($this->session->userdata('absen_masuk') === FALSE): ?>
                                        <li><a href="<?= site_url('absen'); ?>">Absen masuk</a></li>
                                    <?php elseif($this->session->userdata('absen_pulang') === TRUE): ?>
                                        
                                    <?php endif; ?>
                                <?php endif; ?>
                            </ul>
                        </li>
                        
                            <?php if($this->session->userdata('user_status') === 'admin'): ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Data karyawan <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?= site_url('data_karyawan'); ?>">Data karyawan</a></li>
                                    <li><a href="<?= site_url('input_karyawan'); ?>">Tambah data karyawan</a></li>
                                </ul>
                            </li>
                            <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                    
                    <ul class="nav navbar-nav navbar-right hidden-md hidden-lg">
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Akun <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                           
                            <?php if($this->session->has_userdata('logged_in')): ?>
                                <?php if($this->session->userdata('user_status') === 'admin'): ?>
                                    <li><a href="<?= site_url('admin/profile'); ?>">Profile</a></li>
                                <?php else: ?>
                                    <li><a href="<?= site_url('profile'); ?>">Profile</a></li>
                                <?php endif; ?>
                            <?php endif; ?>
                            
                            <li role="separator" class="divider"></li>
                            
                            <?php if($this->session->has_userdata('logged_in')): ?>
                                <li><a href="<?= site_url('logout'); ?>">Logout</a></li>
                            <?php else: ?>
                                <li><a href="<?= site_url('login'); ?>">Login</a></li>
                                <li><a href="<?= site_url('login_admin'); ?>">Login Admin</a></li>
                            <?php endif; ?>
                            
                          </ul>
                        </li>
                    </ul>
                    
                    <?php if($this->session->has_userdata('logged_in')): ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active"><a href="#">
                                <?= strtoupper($this->session->userdata('username').' || '.$this->session->userdata('user_status')); ?>
                            </a></li>
                        </ul>
                    <?php endif; ?>
                    
                </div>
                
            </div>
        </nav>
        
        <div class="container-fluid">
            <div class="row">
                <nav class="col-sm-3 col-md-2 hidden-sm hidden-xs sidebar" style="background-color: #f7f7f7;">
                    <ul class="nav nav-pills flex-column">
                        <?php if($this->session->has_userdata('user_id')): ?>
                            <?php if($this->session->userdata('user_status') === 'admin'): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= site_url('admin/profile'); ?>">
                                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                        Profile
                                    </a>
                                </li>
                            <?php else: ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= site_url('profile'); ?>">
                                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                        Profile
                                    </a>
                                </li>
                            <?php endif; ?>

                            <li class="nav-item" style="height: 1px; margin: 9px 0; overflow: hidden; background-color: #e5e5e5;"></li>
                            
                            <li class="nav-item">
                                <a href="<?= site_url('logout'); ?>" class="nav-link">
                                    <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                                    Logout
                                </a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a href="<?= site_url('login'); ?>" class="nav-link">
                                    <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
                                    Login
                                </a>
                                <a href="<?= site_url('login_admin'); ?>" class="nav-link">
                                    <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
                                    Login Admin
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
                
               <main class="col-sm-12 col-md-10 col-md-offset-2 pt-3">