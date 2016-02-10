
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" >
          <ol class="breadcrumb">
            <li><a href="<?=base_url('backend')?>"><span class='glyphicon glyphicon-home'></span> Beranda</a></li>
            <li><a href="<?=base_url('katalog')?>">Katalog</a></li>
            <li class="active">Daftar Katalog</li>
          </ol>

          <div class="table-responsive">

          <form method="post" action="<?=base_url('katalog')?>">
          <div class="alert"></div>
          <div class="">
            <button class="btn btn-xs btn-primary" name="submit" value="tambah" type="submit"><span class="glyphicon glyphicon-plus"></span> Add</button>
            <button class="btn btn-xs btn-primary" data-target="#myModal" data-toggle="modal" onclick="proses('katalog','submit=update_harga','myModal',1)"><span class="glyphicon glyphicon-edit"></span> Update Harga</button>
             <!-- <b class="pull-right">1 2 3 4 5 6 </b> -->
            </div>
			<div class='pull-right'><?=$this->pagination->create_links()?></div>
            <table class="table table-striped table-hover"  style="font-size:12px;">
              <thead>
                <tr>
                  <th>#</th>
				  <th>Kode</th>
                  <th>Nama Produk</th>
                  <th>Kategori</th>
                  <th>Merk</th>
                  <th>Harga</th>
                  <th>Promo</th>
                  <th>Terlaris</th>
                  <th width="150px"></td>
                </tr>
              </thead>
              <tbody>
              <? $no = $this->uri->segment(3)+1;
              foreach ($sql->result_array() as $data) {
                echo '
                <tr>
                  <td>'.$no.'</td>
				  <td>'.$data['auto'].'</td>
                  <td><a href="">'.$data['nama_produk'].'</a></td>
                  <td>'.$data['kategori'].'</td>
                  <td>'.$data['nama_merk'].'</td>
                  <td>'.number_format($data['harga'],2).'</td>
                  <td><img src="'.base_url().'media/images/'.$data['is_promo'].'.png"></td>
                  <td><img src="'.base_url().'media/images/'.$data['is_terlaris'].'.png"></td>
                  <td>

                  <a href="'.base_url().'katalog/edit/'.$data["auto"].'" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                  <a href="'.base_url().'katalog/hapus/'.$data["auto"].'" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete</a></td>
                </tr>';
              $no++;
              } ?>
 

              </tbody>
            </table>
            </form>
          </div>
        </div>

<script>
 function konfirmasi(){
     var r =  confirm('Anda yakin ingin menghapus data!?');
    if(r){
      return true;
    }else{ return false;  }
 }
</script>