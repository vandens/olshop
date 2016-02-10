    <script type="text/javascript" src="<?=base_url();?>media/editor/ckeditor.js"></script>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="FL">
          <ol class="breadcrumb">
            <li><a href="<?=base_url('backend')?>"><span class='glyphicon glyphicon-home'></span> Beranda</a></li>
            <li><a href="<?=base_url('katalog')?>">Katalog</a></li>
            <li class="active">Edit Katalog</li>
          </ol>


<? foreach ($sql->result() as $val) { ?>

          <form method="post" action="<?=base_url('katalog/update')?>" enctype="multipart/form-data">
          <div class="table-responsive">
          <input type="hidden" name="key" value="<?=$val->auto;?>">
          <input type="hidden" name="foto_b4" value="<?=$val->foto;?>">
            <table class=""  style="font-size:12px;">
                <tr>
                  <td>Kategori</td>
                  <td width="50px"></td>
                  <td> <select class="form-control input-sm" name='param1' onchange="cat_to_merk(this.value)">
                      <?
                        foreach ($cat->result() as $key) {
                         $selected = ($key->auto == $val->id_cat) ? "selected='selected'" : '';
                         echo "<option value=".$key->auto." ".$selected.">".$key->kategori."</option>";
                        }
                      ?>
                      </select></td>
                  <td></td>
                </tr>
                <tr class="form-inline">
                  <td>merek</td>
                  <td></td>
                  <td> <select class="form-control input-sm" name='param2' id='merek'>
                        <option value="<?=$val->id_merk?>"><?=$val->nama_merk?></option>
                      </select></td>
                  <td><!-- <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal" onclick="add('backend/merek_add')"><span class="glyphicon glyphicon-list"></span></button> --></td>
                </tr>
                <tr>
                  <td>Nama Produk</td>
                  <td></td>
                  <td> <input type='text' name='param3' placeholder='Nama Produk - Type' class=" input-sm form-control" value="<?=$val->nama_produk?>"></td>
                  <td></td>
                </tr>
                <tr>
                  <td>Harga</td>
                  <td></td>
                  <td> <input type='text' name='param4' placeholder='Harga Produk (Rp)' class=" input-sm form-control" value="<?=$val->harga?>"></td>
                  <td></td>
                </tr>
                <tr>
                  <td>Gambar</td>
                  <td></td>
                  <td> <input type='file' name='file' ></td>
                  <td><?=$val->foto?></td>
                </tr>
                <tr>
                  <td>Spesifikasi</td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
            </table>
            <textarea class="ckeditor" name='param6' id="editor1"><?=$val->deskripsi?></textarea>
            <br><button type="submit" name="update" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
            
              </div>
            </form>

<? } ?>
        </div>

<script>
  function add(key){
    $.ajax({
        url    : '<?=base_url("katalog/add")?>',
        type   : 'post',
        cache  : false,
        data   : 'view='+key,
        success: function(param){
            $('#myModal').html(param);
        }

    })
  } 

  function cat_to_merk(key){
    $.ajax({
        url    : '<?=base_url("katalog/cat_to_merk")?>',
        type   : 'post',
        cache  : false,
        data   : 'key='+key,
        success: function(param){
            $('#merek').html(param);
        }

    })
  }  
</script>