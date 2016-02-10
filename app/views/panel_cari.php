        <div class="row">
          <div class="col-lg-12">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Cari Produk">
              <div class="input-group-btn">
                 <select class="form-control" style="width:400px;">
                 <option>Pilih Kategori</option>
                          <?
                            foreach ($sql as $key) {
                              echo "<option>".$key['kategori']."</option>";
                            }
                          ?>
                 </select>
                 <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Cari</button>
              </div><!-- /btn-group -->
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->