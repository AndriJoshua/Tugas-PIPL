<div class="navbar navbar-inverse set-radius-zero" style="background-color : #ec961b" >
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">
                <img src="<?= base_url('img/iconbuku.png') ?>" />
            </a>
        </div>
        <?php if (session()->get('login')) : ?>
        <div class="right-div">
            <a href="<?= base_url('logout') ?>" class="btn btn-danger pull-right">LOG OUT</a>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php if (session()->get('login')) : ?>    
<section class="menu-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="navbar-collapse collapse">
                    <ul id="menu-top" class="nav navbar-nav navbar-right">
                        <li><a href="<?= base_url('dashboard') ?>" class="menu-top-active">DASHBOARD</a></li>
                        <li><a href="<?= base_url('issued-books') ?>">Buku Yang Dipinjam</a></li>
                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown">Akun <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?= base_url('profile') ?>">Profil Ku</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?= base_url('change-password') ?>">Ubah Password</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php else : ?>
<section class="menu-section" style="background-color : #b9fdf1; border:4px solid #ec961b">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="navbar-collapse collapse">
                    <ul id="menu-top" class="nav navbar-nav navbar-right">                        
                        <li><a href="<?= base_url('/') ?>">Home</a></li>
                        <li><a href="<?= base_url('#ulogin') ?>">User Login</a></li>
                        <li><a href="<?= base_url('signup') ?>">User Signup</a></li>
                        <li><a href="<?= base_url('adminlogin') ?>">Admin Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
