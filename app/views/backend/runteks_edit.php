<div class='modal-dialog' id="FT">
  <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
        <h4 class='modal-title' id='myModalLabel'><strong>Edit Info Teks Berjalan</strong></h4>
    </div>

    <div class='modal-body'>
    <div class="alert" id="alertx"></div>
        <form id="FA">
          <table class="table table-striped" style="font-size:12px;">
            <tr><td>Isi Informasi</td><td><textarea name="param1" class="form-control"><?=$deskripsi?></textarea>
            </td><td></td></tr>
            <tr><td>Status</td><td>
            <select class="form-control" name="param2">
            <? if($status == 1){
                echo '<option value="1" selected="selected">Aktif</option>
                      <option value="0">Tidak Aktif</option>';
            }else{
                echo '<option value="1">Aktif</option>
                      <option value="0" selected="selected">Tidak Aktif</option>';
            }?>
            </select>
            </td><td></td></tr>
            <input type='hidden' name='submit' value='update'>
            <input type='hidden' name='key' value='<?=$auto?>'>
          </table>
        </form>
    </div>
    <div class='modal-footer'>
    <button type='button' onclick="proses('running_text',$('#FA').serialize(),'alertx',2)" class='btn btn-default btn-sm btn-primary' onclick=""><span class='glyphicon glyphicon-save'></span> Simpan</button>
    <button type='button' class='btn btn-default btn-sm' data-dismiss='modal'><span class='glyphicon glyphicon-remove'></span> Tutup</button>
    </div>
  </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->