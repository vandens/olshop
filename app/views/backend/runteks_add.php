<div class='modal-dialog' id="FT">
  <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
        <h4 class='modal-title' id='myModalLabel'><strong>Tambah Info Teks Berjalan</strong></h4>
    </div>

    <div class='modal-body'>
    <div class="alert" id="alertx" style='display:none'></div>
        <form id="FA">
          <table class="table table-striped" style="font-size:12px;">
            <tr><td>Isi Informasi</td><td><textarea name="param1" class="form-control"></textarea>
            </td><td></td></tr>
            <tr><td>Status</td><td>
            <select class="form-control" name="param2">
              <option value="1">Aktif</option>
              <option value="0">Tidak Aktif</option>
            </select>
            </td><td></td></tr>
            <input type='hidden' name='submit' value='simpan'>
          </table>
        </form>
    </div>
    <div class='modal-footer'>
    <button type='button' onclick="proses('running_text',$('#FA').serialize(),'alertx',2)" class='btn btn-default btn-sm btn-primary' onclick=""><span class='glyphicon glyphicon-save'></span> Simpan</button>
    <button type='button' class='btn btn-default btn-sm' data-dismiss='modal'><span class='glyphicon glyphicon-remove'></span> Tutup</button>
    </div>
  </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->