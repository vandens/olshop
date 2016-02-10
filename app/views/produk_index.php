            <div class="col-lg-12">

              <div class="panel panel-primary">
                <div class="panel-heading">Kategori</div>
                <div class="row" style="padding-top:10px; padding:5px;">
                    <? 
                    if($sql->num_rows() > 0){
                          foreach ($sql->result() as $val){ 
                            echo '
                            <div class="col-sm-3" style="text-align:center;">
                            <div class="panel panel-primary" style="padding-bottom:5px; background-color:white; cursor:pointer;">
                            <div  style="padding:5px; height:100px;">
                                <img src="'.base_url().'media/images/'.$val->foto.'" class="thumbnail">
                                '.$val->kategori.'<br>
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