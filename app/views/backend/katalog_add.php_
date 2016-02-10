    <script type="text/javascript" src="<?=base_url();?>media/editor/ckeditor.js"></script>


        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="FL">
          <ol class="breadcrumb">
            <li><a href="<?=base_url('backend')?>"><span class='glyphicon glyphicon-home'></span> Beranda</a></li>
            <li><a href="<?=base_url('katalog')?>">Katalog</a></li>
            <li class="active">Tambah Katalog</li>
          </ol>


          <form method="post" action="<?=base_url('katalog/simpan')?>" enctype="multipart/form-data">
          <div class="table-responsive">

            <table class=""  style="font-size:12px;">
                <tr>
                  <td>Kategori</td>
                  <td width="50px"></td>
                  <td> <select class="form-control input-sm" name='param1' onchange="cat_to_merek(this.value)">
                      <option value="">Pilih Satu</option>
                      <?
                        foreach ($cat->result() as $key) {
                         echo "<option value=".$key->auto.">".$key->kategori."</option>";
                        }
                      ?>
                      </select></td>
                  <td></td>
                </tr>
                <tr class="form-inline">
                  <td>merek</td>
                  <td></td>
                  <td><select class="form-control input-sm" name='param2' id='merk'>
                        <option value="">Pilih Satu</option>
                      </select></td>
                  <td><button class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal" onclick="add('backend/merek_add')"><span class="glyphicon glyphicon-list"></span></button></td>
                </tr>
                <tr>
                  <td>Nama Produk</td>
                  <td></td>
                  <td> <input type='text' name='param3' placeholder='Nama Produk - Type' class=" input-sm form-control" ></td>
                  <td></td>
                </tr>
                <tr>
                  <td>Harga</td>
                  <td></td>
                  <td> <input type='text' name='param4' placeholder='Harga Produk (Rp)' class=" input-sm form-control" ></td>
                  <td></td>
                </tr>
                <tr>
                  <td>Gambar</td>
                  <td></td>
                  <td> <input type='file' name='file'></td>
                  <td></td>
                </tr>
                <tr>
                  <td>Spesifikasi</td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
            </table>
            <textarea class="ckeditor" name='param6' id="editor1"></textarea>
            <br><button type="submit" name="simpan" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
            
              </div>
            </form>
        </div>
