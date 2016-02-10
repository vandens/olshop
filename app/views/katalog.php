            <div class="col-lg-12">

              <div class="panel panel-primary">
                <div class="panel-heading">Katalog / Kategori</div>
                <div class="row" style="padding-top:10px; padding:5px;">
                    <? 
                    if($sql->num_rows() > 0){
                          foreach ($sql->result() as $val){ 
						  $foto = ($val->foto != '') ? $val->foto : 'no-image.jpg';
                            echo '
                            <div class="col-sm-2" style="text-align:center;">
                            <div class="panel panel-primary" onclick="window.location = \''.base_url().'home/katalog/'.$val->auto.'\'" style="padding-bottom:5px; background-color:white; cursor:pointer;">
                            <div  style="padding:5px; height:165px;">
							<img src="'.base_url().'media/images/'.$foto.'" class="" style="height:125px; width:130px;">
                            '.$val->kategori.'
                            </div>
							</div>
                            </div>';
                          }
                  }else{
                    echo "<div style='text-align:center; color:red; font-size:20px;'>Tidak ada data<br>Coba kata kunci lain</div>";
                  }
                   ?>
                </div>
				
              </div>
            </div>