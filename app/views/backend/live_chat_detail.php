<style type="text/css">
.hidden-scrollbar {
  background-color:white;
  border:0px solid #666;
  color:black;  
  overflow:hidden;
  text-align:justify;    
}

.hidden-scrollbar .inner {
  height:250px;
  overflow:auto;
  margin:15px -300px 15px 15px;
  padding-right:300px; /* Samakan dengan besar margin negatif */
}
</style>
<div class='modal-dialog' id="FT">
  <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
        <h4 class='modal-title' id='myModalLabel'><strong>Live Chat Detail</strong></h4>
    </div>

    <div class='modal-body'>
    <table class="table">
      <tr><td>Chat Reff#</td><td><?=$auto;?></td></tr>
      <tr><td>Chatting</td><td><? echo $dari;?> x <?=$kepada;?></td></tr>
      <tr><td>Pertanyaan</td><td><?=$pertanyaan;?></td></tr>
      <tr><td>Waktu</td><td><?=$date_start;?></td></tr>
    </table>
        <div class='hidden-scrollbar'>
            <div class='inner' id='chatting'>
            <?
              foreach ($sql as $val)
              {
                $class = ($val->sender == $dari) ? 'pull-left' : 'pull-right';
                echo '<blockquote class="'.$class.'">
                    <p>'.$val->sender.'</p>
                    '.$val->message.'<cite title="Source Title"> | Pada : '.$val->send_date.'</cite>
                    </blockquote>'; 
              }

            ?>
            </div>
        </div>
    </div>
    <div class='modal-footer'>
<!-- 
    <button type='button' class='btn btn-default btn-sm btn-primary' onclick="Simpan('katalog/simpanMerk',$('#FA').serialize())"><span class='glyphicon glyphicon-save'></span> Simpan</button>
    <button type='button' class='btn btn-default btn-sm' data-dismiss='modal'><span class='glyphicon glyphicon-remove'></span> Tutup</button>
  -->   
    </div>
  </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->