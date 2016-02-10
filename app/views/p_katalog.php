            <div class="col-lg-12">

              <div class="panel panel-primary">
                <div class="panel-heading">Katalog</div>
				
				<div class='panel'>
					<span class='pull-right'>Halaman : <?=$this->pagination->create_links()?></span>
				</div>
                <div class="row" style="padding-top:10px; padding:5px;">
				
                    <? 
                    if($sql->num_rows() > 0){
                          foreach ($sql->result() as $val){ 
                            echo '
                            <div class="col-sm-2" style="text-align:center;">
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
                  }else{
                    echo "<div style='text-align:center; color:red; font-size:20px;'>Tidak ada data<br>Coba kata kunci lain</div>";
                  }
                   ?>
				   
		<!--		<div class='' style='margin-right:10px'>
					<span class='pull-right'>Halaman : <?=$this->pagination->create_links()?></span>
				</div>-->
                </div>
				
              </div>
            </div>