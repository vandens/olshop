        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
			<li class="pan"><a href="<?=base_url()?>" target="_blank"><span class='glyphicon glyphicon-home'></span> Tampilan Frontend</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li class="pan" id='setting'><a href="<?=base_url('setting')?>"><span class='glyphicon glyphicon-cog'></span> General Setting</a></li>
            <li class="pan" id='imgheader'><a href="<?=base_url('imgheader')?>"><span class='glyphicon glyphicon-picture'></span> Image Header</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li class="pan" id='kategori'><a href="<?=base_url('kategori')?>"><span class='glyphicon glyphicon-briefcase'></span> Kategori</a></li>
        <!-- <li class="pan" id='merek'><a href="<?=base_url('merk')?>"><span class='glyphicon glyphicon-home'></span> Merk</a></li> -->
            <li class="pan" id='katalog'><a href="<?=base_url('katalog')?>"><span class='glyphicon glyphicon-th'></span> Katalog</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li class="pan" id='running_text'><a href="<?=base_url('running_text')?>"><span class='glyphicon glyphicon-flash'></span> Running Text</a></li>
            <li class="pan" id='testimoni'><a href="<?=base_url('testimoni')?>"><span class='glyphicon glyphicon-tags'></span> Testimoni</a></li>
        <!--  <li class="pan" id='live_chat'><a href="<?=base_url('live_chat')?>"><span class='glyphicon glyphicon-comment'></span> Live Chat</a></li> -->
        <!--  <li class="pan" id='msg_offline'><a href="<?=base_url('msg_offline')?>"><span class='glyphicon glyphicon-tags'></span> Pesan Offline</a></li> -->
          </ul>
          <ul class="nav nav-sidebar">
            <li class="pan" id='order'><a href="<?=base_url('other/show/3')?>"><span class='glyphicon glyphicon-briefcase'></span> Cara Pemesanan</a></li>
            <li class="pan" id='com_order'><a href="<?=base_url('com_order')?>"><span class='glyphicon glyphicon-briefcase'></span> Konfirmasi Pemesanan</a></li>
        <!--  <li class="pan" id='tentang'><a href="<?=base_url('other/show/1')?>"><span class='glyphicon glyphicon-briefcase'></span> Tentang Kami</a></li> -->
            <li class="pan" id='kontak'><a href="<?=base_url('other/show/2')?>"><span class='glyphicon glyphicon-th'></span> Hubungi Kami</a></li>
          </ul>
        </div>
  <input type='hidden' name='menu' id='menu' value="<?=$menu?>">
