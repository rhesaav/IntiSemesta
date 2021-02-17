<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <!-- <h5 class="card-title m-b-0">Penggunaan <?=$pelanggan[0]->nama?></h5> -->
        </div>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Bulan</th>
              <th scope="col">Tahun</th>
              <th scope="col">Total</th>
              <th scope="col">Bukti</th>
              <th scope="col">Status</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $bulan_arr =array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
            $i = 0;
            foreach ($show as $s ) {
              $i++;
              $cek = $this->tagihan->cek_pembayaran($s->id_tagihan);

              ?>


              <tr>
               <th scope="row"><?=$i?></th>
               <td><?=$bulan_arr[$s->bulan]?></td>
               <td><?=$s->tahun?></td>
               <td><?php echo $s->harga * $s->jumlah_meter?></td>
               <td>
                  <!-- <img src="<?=base_url()?>/assets/bukti/<?=$s->bukti?>"> -->
                  <!-- <?php if ($cek->bukti !== null) {
                    echo $cek->bukti;
                  } else{ ?>
                    ok
                  <?php } ?> -->
                  
               </td>
               <td>
                <?php if ($s->status == 0){
                  echo "Belum Bayar";
                }elseif($s->status == 1){
                  echo "Sudah Bayar";
                }else{
                  echo "Pending";
                }
                ?>  
              </td>

              <td>

                <?php if ($s->status == 1){ ?>
                <h4>LUNAS</h4>
                <?php }else{ ?>
                <button type="button" class="btn btn-success btn-sm" onclick="upload(<?=$s->id_tagihan?>)" data-toggle="modal" data-target="#upload">Upload</button>  
                <?php } ?>
              </td>
              <td></td>
            </tr>

            <?php } ?>


          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title te" id="myModalLabel">Upload Bukti</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <form class="form-horizontal" action="<?=base_url('pembayaran/bukti')?>" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" name="id_tagihan" id="u_id">
          <div class="form-group row">
            <label for="fdaya" class="col-sm-3 text-left control-label col-form-label">Bukti</label>
            <div class="col-sm-9">
              <input type="file" name="bukti">
              <!-- <div class="custom-file"> -->
                <!-- <input type="file" class="custom-file-input" id="validatedCustomFile" required="">
                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                <div class="invalid-feedback">Example invalid custom file feedback</div> -->
              <!-- </div> -->
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" name="submit" class="btn btn-primary" value="Save Changes">
        </div>
      </div>
    </form>
  </div>
</div>

<script type="text/javascript">
  function upload(a) {
    $('#u_id').val(a);
  }
</script>