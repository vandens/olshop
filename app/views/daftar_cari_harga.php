            <div class="col-lg-6">
              <div class="panel panel-primary">
                <div class="panel-heading">Daftar Harga</div>
                <div  style="padding:5px;">
                <form method='post' action='<?=base_url()?>home/cariharga.html'>
                Filter : 
				<table>
					<tr><td>Kategori	</td><td></td><td><input type="text" name="param1" placeholder="" class="form-control input-sm" onkeypress="cari(this.value)"></td></tr>
					<tr><td>Merk		</td><td></td><td><input type="text" name="param2" placeholder="" class="form-control input-sm" onkeypress="cari(this.value)"></td></tr>
					<tr><td>Nama Barang	</td><td></td><td><input type="text" name="param3" placeholder="" class="form-control input-sm" onkeypress="cari(this.value)"></td></tr>
					<tr><td>Harga		</td><td></td><td><input type="text" name="param4" placeholder="" class="form-control input-sm" onkeypress="cari(this.value)"></td></tr>
				</table>
				<input type='submit' name='cari' class='btn btn-primary btn-sm' value='Cari'>
                </form>
				<div class='pull-right'>
					<?=$this->pagination->create_links()?>
				</div>
	            <table class="table" style="width:;">
	              <thead>
	                <tr>
	                  <th>#</th>
	                  <th>Kategori</th>
	                  <th>Merk</th>
	                  <th>Nama Barang</th>
	                  <th></th>
	                  <th>Harga</th>
	                </tr>
	              </thead>
	              <tbody id="cari_produk">
	              <? $i = $this->uri->segment(3)+1;
	              foreach ($sql as $val) {
	              	echo '
	                <tr>
	                  <td><a href="'.base_url().'home/detail/'.$val->auto.'" target="_blank">'.$i.'</a></td>
	                  <td><a href="'.base_url().'home/detail/'.$val->auto.'" target="_blank">'.$val->kategori.'</a></td>
	                  <td><a href="'.base_url().'home/detail/'.$val->auto.'" target="_blank">'.$val->nama_merk.'</a></td>
	                  <td><a href="'.base_url().'home/detail/'.$val->auto.'" target="_blank">'.$val->nama_produk.'</a></td>
	                  <td><a href="'.base_url().'home/detail/'.$val->auto.'" target="_blank">Rp</a></td>
	                  <td style="text-align:right;"><a href="'.base_url().'home/detail/'.$val->auto.'" target="_blank">'.number_format($val->harga).'</a></td>
	                </tr>
	                ';
	                $i++;
	              }
	              ?>
	              </tbody>
	            </table>

	            </div>
              </div>
            </div>