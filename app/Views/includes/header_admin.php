<div class="navbar navbar-inverse set-radius-zero" style="background-color : #ec961b">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">

                <img src="<?=base_url('img/iconbuku.png')?>" />
            </a>

        </div>

        <div class="right-div">
            <a href="<?= base_url('logout') ?>"class="btn btn-danger pull-right">LOG OUT</a>
        </div>
    </div>
</div>
<!-- LOGO HEADER END-->
<section class="menu-section" style="background-color : #b9fdf1;border:4px solid #ec961b">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="navbar-collapse collapse ">
                    <ul id="menu-top" class="nav navbar-nav navbar-right">
                        <li><a href="<?=base_url("dashboard-admin")?>" class="menu-top-active">DASHBOARD</a></li>

                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Kategori <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=base_url("add-category")?>">Tambah Kategori</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=base_url("manage-categories")?>">Atur Kategori</a></li>
                            </ul>   
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Penulis <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=base_url("add-author")?>">Tambah Penulias</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=base_url("manage-authors")?>">Atur Penulis</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Buku <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=base_url("add-book")?>">Tambah Buku</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=base_url("manage-books")?>">Atur Buku</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Peminjaman Buku <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=base_url("issue-book")?>">Peminjaman Buku Baru</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=base_url("manage-issued-books")?>">Atur Peminjaman Buku</a></li>
                            </ul>
                        </li>
                        <li><a href="reg-students">Siswa Terdaftar</a></li>
                        <li><a href="change-password-admin">Ubah Password</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>