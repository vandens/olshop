            <div class="col-md-3">
              <div class="panel panel-primary">
                <div class="panel-heading" style="padding:-5px;">Kategori</div>

                <ul class="nav nav-pills nav-stacked"  style="padding:5px; background-color:#CF09E6;">
                <?
                  foreach ($sql as $key) {

                    if($key['jml'] > 0){
                        echo '<li><a style="color:white;" href="'.base_url().'home/katalog/'.$key["auto"].'" class="dropdown-toggle" data-toggle="dropdown">'.$key["kategori"].'<span class="glyphicon glyphicon-play pull-right btn btn-xs"></span></a>';
                        echo '<ul class="dropdown-menu" style="margin-left:200px; margin-top:-30px; background-color:#CF09E6; color:white;">';

                        $h = $this->db->where('id_cat',$key['auto'])->get('t_merk');
                              foreach ($h->result_array() as $mn) {
                                echo '<li><a  href="'.base_url().'home/katalog/'.$mn["auto"].'">'.$mn['nama_merk'].'</a></li>';
                              }
                        echo '</ul>';
                    }else{
                           echo '<li><a style="color:white;" href="'.base_url().'home/katalog/'.$key["auto"].'">'.$key["kategori"].'</a></li>';
                    }



                   }
                ?>
                
                </ul>

              </div>
            </div>