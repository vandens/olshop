<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



            <div class="col-md-3">
              <div class="panel panel-primary">
                <div class="panel-heading">CS Marketting</div>
                <div  style="padding:5px; text-align:center;">
                <?

              //   $atts = array(
              //                 'width'      => '500',
              //                 'height'     => '500',
              //                 'scrollbars' => 'yes',
              //                 'status'     => 'yes',
              //                 'resizable'  => 'no',
              //                 'screenx'    => '0',
              //                 'screeny'    => '0'
              //               );
              // $i = 1;
              // foreach ($chat as $c) {
              //   $st = ($c['is_login'] == 1)?'online.jpg' : 'offline.jpg';
              //   echo "<img src='".base_url('media/images/'.$st.'')."' width='50px'> ".anchor_popup(base_url('home/live_chat'), $c['nama_lengkap'], $atts)."<br>";
              // $i++;
              // }

              ?>

              <p><a href="ymsgr:sendIM?tessaputra" class="nonlink"><img src="http://opi.yahoo.com/online?u=tessaputra&m=g&t=14" border="0" /></a><!-- <br>cs1_nusaelektronik --><br>Tesa Putra</p>
              <p><a href="ymsgr:sendIM?cs2_nusaelektronik" class="nonlink"><img src="http://opi.yahoo.com/online?u=cs2_nusaelektronik&m=g&t=14" border="0" /></a><!-- <br>cs2_nusaelektronik --><br> Linda</p>
              </div>
             </div>

              <div class="panel panel-primary">
                <div class="panel-heading">Temukan kami di facebook</div>
                  <div  style="padding:5px;">
                    <div class="fb-like-box" data-href="http://www.facebook.com/nusantarakom" data-width="200" data-height="300" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
                  </div>
              </div>

              <div class="panel panel-primary" style="height:500px;">
                <div class="panel-heading" style="padding:-5px;">Produk Terbaru</div>
                <div  style="padding:5px;">
                <marquee direction="up" width="200px" height="450px" scrollamount="4" onmouseover="this.stop();" onmouseout="this.start();">
                <?
                  foreach ($sqly as $yz) {
                    echo '<img src="'.base_url().'media/images/'.$yz['foto'].'" class="thumbnail" style="width:200px">';
                    echo '<center><a href="'.base_url().'home/detail/'.$yz['auto'].'" style="align:center">'.$yz['nama_produk'].'</a></center><p>';
                  }
                ?>
                </marquee>
                </div>
              </div>
            </div>