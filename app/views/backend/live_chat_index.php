
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="index">
          <ol class="breadcrumb">
            <li><a href="<?=base_url('backend')?>"><span class='glyphicon glyphicon-home'></span> Beranda</a></li>
            <li><a href="<?=base_url('live_chat')?>">Live Chat</a></li>
            <li class="active">Live Chat List</li>
          </ol>

          <div class="table-responsive">

          <div class="alert"></div>
          <div class="">
<!--             <button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal" onclick="proses('running_text','submit=tambah','myModal',1)"><span class="glyphicon glyphicon-plus"></span> Add</button> -->
<!--             <button class="btn btn-sm btn-primary" data-target="#myModal" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Update Price</button> -->
             <!-- <b class="pull-right">1 2 3 4 5 6 </b> -->
            </div>


             <?
                $atts = array(
                              'width'      => '500',
                              'height'     => '500',
                              'scrollbars' => 'yes',
                              'status'     => 'yes',
                              'resizable'  => 'no',
                              'screenx'    => '0',
                              'screeny'    => '0'
                            );
              ?>

            <table class="table table-striped table-hover"  style="font-size:12px;">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Chat Reff#</th>
                  <th width="150px">Dari</th>
                  <th>Email</th>
                  <th>Kepada</th>
                  <th>Pertanyaan</th>
                  <th>Waktu</th>
                  <th>Status</th>
                  <td width="150px"></td>
                </tr>
              </thead>
              <tbody>
              <? $no = 1;
              foreach ($sql->result_array() as $data) {
                if($data['status'] == 1)
                      $status = 'Pending';
                elseif($data['status'] == 2)
                      $status = 'Accepted';
                elseif($data['status'] == 3)
                      $status = 'Closed';
                elseif($data['status'] == 4)
                      $status = 'Rejected';

                echo '
                <tr>
                  <td>'.$no.'</td>
                  <td><a href="" onclick="proses(\''.base_url('live_chat').'\',\'submit=detail&key='.$data["auto"].'\',\'myModal\',1)" data-toggle="modal" data-target="#myModal">'.$data['auto'].'</a></td>
                  <td>'.$data['dari'].'</td>
                  <td>'.$data['email'].'</td>
                  <td>'.$data['kepada'].'</td>
                  <td>'.$data['pertanyaan'].'</td>
                  <td>'.$data['date_start'].'</td>
                  <td>'.$status.'</td>
                  <td>
                  '.anchor_popup(base_url('home/chatting/'.$data['auto']),'<button class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span> Balas</button>', $atts).'
                  
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