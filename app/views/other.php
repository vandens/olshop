<? foreach ($sql as $val) {

echo '   <div class="col-lg-9">
              <div class="panel panel-primary">
                <div class="panel-heading">'.$val->judul.'</div>
                	<div  style="padding:5px;">
                          '.$val->isi.'
                    </div>
              </div>
            </div>';

} ?>