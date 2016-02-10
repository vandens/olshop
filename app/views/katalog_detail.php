           <div class="col-lg-9">

              <div class="panel panel-primary">
                  <? foreach ($sql2->result() as $val){ 
                       echo '<div class="panel-heading">Detail Produk : '.$val->nama_produk.'</div>';
                       echo '<div style="padding:5px; ">';
                       echo '<div class="row">'; 
                       echo '<div class="col-sm-4">';  				   
                       echo '<img src="'.base_url().'media/images/'.$val->foto.'" style="width:300px" class="thumbnail" align="center"><br>';
                       echo '<center><h2><strong>Rp '.number_format($val->harga).'</strong></h2></center>';
                       echo '<a href="#" onclick="beli(\''.$val->auto.'\')"  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" style="margin-left:90px;"><span class="glyphicon glyphicon-shopping-cart"></span> Beli</a>';
                       echo '</div>'; 
                       echo '<div class="col-sm-8">';
                       echo $val->deskripsi;
                       echo '</div>';
                       echo '</div>';
                       echo '</div>';
                    }
                   ?>


              </div>

              <div class="panel panel-primary">
                <div class="panel-heading">Produk Lainnya</div>
                <div class="row" style="padding-top:10px; padding:5px;">
                    <? foreach ($sql3->result() as $val){ 
                      echo '
                      <div class="col-sm-3" style="text-align:center;">
                      <div class="panel panel-primary" style="padding-bottom:5px;">
                      <div  style=" height:225px;">
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