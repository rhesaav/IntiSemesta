<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title m-b-0">Penggunaan <?=$pelanggan[0]->nama?></h5>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Bulan</th>
              <th scope="col">Tahun</th>
              <th scope="col">Meter Awal</th>
              <th scope="col">Meter AKhir</th>
              <th scope="col">Total Penggunaan</th>
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
               <td><?=$bulan_arr[$s->bulan]?></td>
               <td><?=$s->tahun?></td>
               <td><?=$s->meter_awal?></td>
               <td><?=$s->meter_akhir?></td>
               <td><?php echo $s->meter_akhir - $s->meter_awal?></td>
               <td>
                 <a href="<?=base_url()?>epnggunaan/delete/<?=$s->id_penggunaan?>" type="button" class="btn btn-danger btn-sm ml-1">&nbsp;Delete&nbsp;</a>
               </td>
             </tr>

             <?php } ?>


           </tbody>
         </table>
       </div>
     </div>
   </div>
 </div>