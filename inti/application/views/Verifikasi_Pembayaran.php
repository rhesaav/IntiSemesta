<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title m-b-0">Verifikasi</h5>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nomor Meteran</th>
              <th scope="col">Tanggal Pembayaran</th>
              <th scope="col">Bulan/Tahun</th>
              <th scope="col">Biaya Admin</th>
              <th scope="col">Total Bayar</th>
              <th scope="col">Status</th>
              <th scope="col">Bukti</th>
              <th scope="col">Verifikasi</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $bulan_arr =array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
            $i = 0;
            foreach ($show as $s ) {
              $i++;?>

              <tr>
               <th scope="row"><?=$i?></th>
               <td><?=$s->tahun?></td>
               <td><?=$s->tanggal?></td>
               <td><?=$bulan_arr[$s->bulan]?> - <?=$s->tahun?></td>
               <td>Rp. 2500</td>
               <td><?php echo $s->harga * $s->jumlah_meter + 2500?></td>
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
                  <!-- <img src="<?=base_url()?>/assets/bukti/<?=$s->bukti?>"> -->
                  <?=$s->bukti?>
               </td>
               <td></td>
               <td>
                 <button onclick="window.location.href='<?=base_url()?>verifikasi_pembayaran/ver/<?=$s->id_pembayaran?>/<?=$s->id_tagihan?>/1'"" class="btn btn-info btn-sm ml-1">&nbsp;Accept&nbsp;</button>

                  <button onclick="window.location.href='<?=base_url()?>verifikasi_pembayaran/ver/<?=$s->id_pembayaran?>/<?=$s->id_tagihan?>/0'"" class="btn btn-danger btn-sm ml-1">&nbsp;Deny&nbsp;</button>
               </td>
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