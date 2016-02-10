
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" >
          <ol class="breadcrumb">
            <li><a href="<?=base_url('backend')?>"><span class='glyphicon glyphicon-home'></span> Beranda</a></li>
            <li><a href="<?=base_url('com_order')?>">Konfirmasi Pembayaran</a></li>
            <li class="active">Daftar Konfirmasi Pembayaran</li>
          </ol>

          <div class="table-responsive">

          <form method="post" action="<?=base_url('com_order')?>">
          <div class="alert"></div>
         <!--
		 <div class="">
            <button class="btn btn-xs btn-primary" name="submit" value="tambah" type="submit"><span class="glyphicon glyphicon-plus"></span> Add</button>
            <button class="btn btn-xs btn-primary" data-target="#myModal" data-toggle="modal" onclick="proses('katalog','submit=update_harga','myModal',1)"><span class="glyphicon glyphicon-edit"></span> Update Harga</button>
          </div>-->
			<div class='pull-right'><?=$this->pagination->create_links()?></div>
            <table class="table table-striped table-hover"  style="font-size:12px;">
              <thead>
                <tr>
                  <th>#</th>
				  <th>Transaksi ID</th>
                  <th>Pengirim</th>
                  <th>Nama Bank</th>
                  <th>Tgl Transfer</th>
                  <th>Jumlah Transfer</th>
                  <th>No Telepon</th>
                  <th>Email</th>
                  <th>Keterangan</th>
                  <th>Status</th>
                  <th width="175px"></td>
                </tr>
              </thead>
              <tbody>
              <? $no = $this->uri->segment(3)+1;
              foreach ($sql as $data) {
                echo '
                <tr>
                  <td>'.$no.'</td>
				  <td><a href="#" onclick="proses(\'com_order/detail\',\'key='.$data['auto'].'\',\'myModal\',1)" data-toggle="modal" data-target="#myModal" title="Klik untuk melihat Detail">'.$data['auto'].'</a></td>
                  <td>'.$data['pengirim'].'</td>
                  <td>'.$data['nama_bank'].'</td>
                  <td>'.$data['tgl_transfer'].'</td>
                  <td>'.number_format($data['amount'],2).'</td>
                  <td>'.$data['notelp'].'</td>
                  <td>'.$data['email'].'</td>
                  <td>'.$data['keterangan'].'</td>
                  <td><img src="'.base_url().'media/images/'.$data['status'].'.png"></td>
                  <td>

                  <a href="'.base_url().'com_order/approve/'.$data["auto"].'" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span>Setujui</a>
                  <a href="'.base_url().'com_order/hapus/'.$data["auto"].'" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span>Hapus</a></td>
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