
      <!-- Static navbar -->
      <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
<!--             <a class="navbar-brand" href="<?=base_url('home');?>"><span class='glyphicon glyphicon-home'></span></a> -->
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <input type='hidden' id='menu' value='<?=$menu;?>'>
              <li class='pan active' id="home"><a href="<?=base_url('home.html');?>"><span class='glyphicon glyphicon-home'></span> Home</a></li>
              <li class='pan' id="order"><a href="<?=base_url('home/order.html');?>">Cara Pemesanan</a></li>
			  <li class='pan' id="com_order"><a href="<?=base_url('home/com_order.html');?>">Konfirmasi Pembayaran</a></li>
<!--          <li class='pan' id="tentang"><a href="<?=base_url('home/tentang.html');?>">Tentang Kami</a></li>-->
              <li class='pan' id="kontak"><a href="<?=base_url('home/kontak.html');?>">Hubungi Kami</a></li>
              <li class='pan' id="katalog"><a href="<?=base_url('home/katalog.html');?>">Katalog</a></li>
              <li class='pan' id="testimoni"><a href="<?=base_url('home/testimoni.html');?>">Testimoni</a></li>
              <li class='pan' id="harga"><a href="<?=base_url('home/harga.html');?>">Daftar Harga</a></li>
<!--               <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Daftar Harga <b class="caret"></b></a>
                <ul class="dropdown-menu">
                <?
                  foreach ($sql as $key) {
                    echo "<li><a href='#'>".$key['kategori']."</a></li>";
                  }
                ?>
                </ul>
              </li> -->
            </ul>
                  <form class="navbar-form navbar-right" role="search" action="<?=base_url('home/search');?>" method="post">
                     <div class="form-group" style="width:180px;">
                      <input type="text" name="key" class="col-sm-3 form-control" placeholder="Cari Nama Produk / Kategori / Merk / Harga"> 
                      </div>
                     <button type="submit" name="submit" value="cari" class="btn btn-default"><span class='glyphicon glyphicon-search'></span></button>
                  </form>           
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>