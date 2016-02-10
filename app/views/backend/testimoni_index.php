
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="index">
          <ol class="breadcrumb">
            <li><a href="<?=base_url('backend')?>"><span class='glyphicon glyphicon-home'></span> Beranda</a></li>
            <li><a href="<?=base_url('testimoni')?>">Teks Berjalan</a></li>
            <li class="active">Informasi Teks Berjalan</li>
          </ol>

          <div class="table-responsive">

          <div class="alert" style='display:none'></div>
          <div class="">
<!--             <button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal" onclick="proses('testimoni','submit=tambah','myModal',1)"><span class="glyphicon glyphicon-plus"></span> Add</button> -->
<!--             <button class="btn btn-sm btn-primary" data-target="#myModal" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Update Price</button> -->
             <!-- <b class="pull-right">1 2 3 4 5 6 </b> -->
            </div>
			<div class='pull-right'><?=$this->pagination->create_links()?></div>
            <table class="table table-striped table-hover"  style="font-size:12px;">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Pengirim</th>
                  <th>Email</th>
                  <th>Isi Pesan</th>
                  <th>Waktu Input</th>
                  <th>Status</th>
                  <th width="175px"></td>
                </tr>
              </thead>
              <tbody>
              <? $no = $this->uri->segment(3)+1;
              foreach ($sql->result_array() as $data) {
                if($data['status'] == 1)
                    $status = 'Pending';
                elseif($data['status'] == 2)
                    $status = 'Approved';
                else $status = 'Rejected';
                echo '
                <tr>
                  <td>'.$no.'</td>
                  <td>'.$data['nama'].'</td>
                  <td>'.$data['email'].'</td>
                  <td>'.$data['pesan'].'</td>
                  <td>'.$data['add_date'].'</td>
                  <td>'.$status.'</td>
                  <td>
                  <a href="'.base_url().'testimoni/approve/'.$data["auto"].'" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-ok"></span> Setujui</a>
                  <a href="'.base_url().'testimoni/reject/'.$data["auto"].'" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span> Hapus</a></td>'; 
             //     <a href="'.base_url().'testimoni/reject/'.$data["auto"].'" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span> Reject</a></td>';  
            echo '</tr>';
              $no++;
              } ?>
 

              </tbody>
            </table>
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