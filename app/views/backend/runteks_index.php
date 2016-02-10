
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="index">
          <ol class="breadcrumb">
            <li><a href="<?=base_url('backend')?>"><span class='glyphicon glyphicon-home'></span> Beranda</a></li>
            <li><a href="<?=base_url('running_text')?>">Teks Berjalan</a></li>
            <li class="active">Teks Berjalan</li>
          </ol>

          <div class="table-responsive">

          <div class="alert"></div>
          <div class="">
            <button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal" onclick="proses('running_text','submit=tambah','myModal',1)"><span class="glyphicon glyphicon-plus"></span> Add</button>
<!--             <button class="btn btn-sm btn-primary" data-target="#myModal" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Update Price</button> -->
             <!-- <b class="pull-right">1 2 3 4 5 6 </b> -->
            </div>
            <table class="table table-striped table-hover"  style="font-size:12px;">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Deskripsi</th>
                  <th>Status</th>
                  <th>Add By</th>
                  <th>Add Date</th>
                  <td width="150px"></td>
                </tr>
              </thead>
              <tbody>
              <? $no = 1;
              foreach ($sql->result_array() as $data) {
                $status = ($data['status'] == 1) ? 'Aktif' : 'Tidak Aktif';
                echo '
                <tr>
                  <td>'.$no.'</td>
                  <td>'.$data['deskripsi'].'</td>
                  <td>'.$status.'</td>
                  <td>'.$data['add_by'].'</td>
                  <td>'.$data['add_date'].'</td>
                  <td>

                  <button onclick="proses(\'running_text\',\'submit=edit&key='.$data["auto"].'\',\'myModal\',1)" data-toggle="modal" data-target="#myModal" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span> Edit</button>
                  <a href="'.base_url().'running_text/hapus/'.$data["auto"].'" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete</a></td>
                </tr>';
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