            <div class="col-lg-6">
              <div class="panel panel-primary">
              <div class="panel-heading">Produk Promo</div>

              <div class="panel">
                  <div id="slider1_container" style="margin-left:20px; margin-top:45px; width:530px; height:315px;">
                    <!-- Slides Container -->
                    <div u="slides" style="cursor: move; position:; width:530px; height:375px; overflow: hidden;">
                        <?
                        foreach ($sql2->result() as $val) {
                            echo "
                            <div>
                                  <a u=image href='".base_url()."home/detail/".$val->auto."'><img src=\"".base_url()."media/images/".$val->foto."\" class='thumbnail'></a>
                            </div>";
                        }
                        ?>
                    </div>
					<div u="navigator" class="jssorn03" style="position: absolute; bottom: 4px; left: 4px;  cursor:pointer;">
                    <div u="prototype" style="position: absolute; width: 15px; height: 21px; text-align:center; line-height:21px; color:black; font-size:10px;"><NumberTemplate></NumberTemplate></div>
                    </div>
                </div>

              </div>
              </div>

              <div class="panel panel-primary">
                <div class="panel-heading">Produk Terlaris</div>
                <br>
                    <div class="row"  style="padding:5px;">
                    <? foreach ($sql->result() as $val){ 
                      echo '
                      <div class="col-md-4" style="text-align:center;">
                      <div class="panel panel-primary" style="padding-bottom:5px; background-color:white;">
                      <div  style="padding:5px; height:225px;">
							<img src="'.base_url().'media/images/'.$val->foto.'" class="" style="height:125px; width:130px;">
                                Kode : <b>'.$val->auto.'</b><br>
								'.substr($val->nama_produk,0,14).'...<br>
                                Rp '.number_format($val->harga,2).'<br>
                      </div>
                      <a href="'.base_url().'home/detail/'.$val->auto.'" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-th-list"></span> Detail</a>
                      <a href="#" onclick="beli(\''.$val->auto.'\')"  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-shopping-cart"></span> Beli</a>
                      </div>
                      </div>';
                    }
                   ?>
                    </div>

              </div>
            </div>