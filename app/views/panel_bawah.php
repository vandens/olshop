        <div class="row">
		    <div class="col-lg-3">
            <!--  <div class="panel panel-primary" style=" height:225px;">
                <div class="panel-heading" style="padding:-5px;">Testimoni</div>
                <div  style="padding:5px;">
                  <?
                  $sql2 = $this->db->limit('6')->get('t_testimoni');
                  foreach ($sql2->result() as $k) {
                    $a = explode(' ', $k->add_date);
                    echo $k->nama.' | '.$a[0]."<br>";
                  }
                  ?>
                  </div>
              </div>-->
			  
				<div class="panel panel-primary" id="menu" style="height:225px;" >
					<div class="panel-heading">Statistik</div>
					<div style='padding:5px'>
					<?
					foreach($getStatik['0'] as $d){ echo "Total Hits : ".$d->tot_hits."<br>"; }
					foreach($getStatik['2'] as $d){ echo "Hits Hari ini : ".$d->hitstoday."<br>"; }
					foreach($getStatik['3'] as $d){ echo "Total Pengunjung :".$d->tot_visit."<br>"; }
					echo "Pengunjung Hari ini : ".$getStatik['1']."<br><br>";
					echo "Alamat IP Kamu  :".$_SERVER['REMOTE_ADDR'];
					echo "<br>Browser Kamu    :".$this->agent->browser." ".$this->agent->version;
					?>
					</div>
				</div>
            </div>
		
            <div class="col-lg-3">
              <div class="panel panel-primary" style="height:225px;">
                <div class="panel-heading">Sosial Media</div>
                  <div  style="padding:5px;">
                  <a href="https://www.facebook.com/nusantarakom" target="_blanks"><img src='<?=base_url();?>media/images/fb.png' style="width:50px; height:50px; margin-top:10px;"></a>
                  <img src='<?=base_url();?>media/images/youtube.png' style="width:50px; height:50px; margin-top:10px;">
                  <img src='<?=base_url();?>media/images/twitter.png' style="width:50px; height:50px; margin-top:10px;">
                  </div>
              </div>
            </div>

            <div class="col-lg-3">
              <div class="panel panel-primary" style="height:225px;" >
                <div class="panel-heading">Rekening Bank</div>
                <div  style="padding:5px;">
                  <img src='<?=base_url();?>media/images/bank_bca.png' style="width:100px; margin-bottom:10px;" class="thumbnail pull-left"> a.n. Siti Juhaeriah 7110626945 <br style="clear:both;"><!-- 
                  <img src='<?=base_url();?>media/images/bank_mandiri.jpg' style="width:100px; margin-bottom:10px;" class="thumbnail pull-left"> a.n. Pengguna 123456789<br style="clear:both;">
                  <img src='<?=base_url();?>media/images/bank_bri.jpg' style="width:100px; height:40px; margin-bottom:10px;" class="thumbnail pull-left"> a.n. Pengguna 98763123<br style="clear:both;"> -->
                </div>
              </div>
            </div>

             <div class="col-lg-3">
              <div class="panel panel-primary" style="height:225px;">
                <div class="panel-heading">Pengiriman</div>
                <div align="center" style="padding:5px;">
                  <img src='<?=base_url();?>media/images/expedisi_jne.jpg' style="width:150px; height:50px; margin-bottom:10px;" class="thumbnail">
                  <img src='<?=base_url();?>media/images/expedisi_tiki.jpg' style="width:150px; height:50px; margin-bottom:10px;" class="thumbnail">
                  <img src='<?=base_url();?>media/images/expedisi_pos.jpg' style="width:150px; height:50px; margin-bottom:10px;" class="thumbnail">
                </div>
              </div>
            </div>
        </div>

        <div style="text-align:center; font-size:10px">
          Copyright &copy; <?=date('Y')." <a href='".base_url()."'>".$nama_aplikasi."</a>";?><br>
          Powered by <a href='#'>Code Line Development</a>
        </div>