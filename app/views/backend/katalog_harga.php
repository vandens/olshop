<div class='modal-dialog' id="FT">
  <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
        <h4 class='modal-title' id='myModalLabel'><strong>Update Harga Barang</strong></h4>
    </div>
    <div class='modal-body'>
    <div class="alert" id="al"></div>
          <table class="table table-striped" style="font-size:12px;">
            <tr><td>Kategori         </td><td>
                <select class="form-control input-sm" name='param1' onchange="takelist(this.value)">
                    <option value="">Pilih salah satu</option>
                      <?
                        foreach ($cat->result() as $key) {
                         echo "<option value=".$key->auto.">".$key->kategori."</option>";
                        }
                      ?>
                      </select>
            </td><td></td></tr>
            <tr><td>Merk      </td><td>
                    <select class="form-control input-sm" name='param2' id='merk' onchange="takeharga(this.value)">
                        <option value="0">Pilih Satu</option>
                      </select>
            </td><td></td></tr>
          </table>

        <form id="FA">
          <table class="table table-hover" style="font-size:12px;">
          <thead><tr><td>#</td><td>Nama Barang</td><td>Promo</td><td>Terlaris</td><td>Harga</td></tr></thead>
          <tbody id='listz'>
          </tbody>
          </table>

        </form>
    </div>
    <div class='modal-footer'>
    <button type='button' class='btn btn-default btn-sm btn-primary' onclick="proses('katalog',$('#FA').serialize(),'al',2)"><span class='glyphicon glyphicon-save'></span> Simpan</button>
    <button type='button' class='btn btn-default btn-sm' data-dismiss='modal'><span class='glyphicon glyphicon-remove'></span> Tutup</button>
    </div>
  </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->

<script>
function takelist(key){
  $.ajax({
    url     : 'katalog/cat_to_merk',
    type    : 'post',
    data    : 'key='+key,
    success : function(param){
        $('#merk').html(param);
    }
  })
}

function takeharga(key){
  $.ajax({
    url     : 'katalog',
    type    : 'post',
    data    : 'submit=take_harga&key='+key,
    success : function(param){
        $('#listz').html(param);
    }
  })
}

function Simpan(url,xdata){
  $.ajax({
    url     : url,
    type    : 'post',
    data    : xdata,
    success : function(param){
        $('#listx').html(param);
    }
  })
}

</script>