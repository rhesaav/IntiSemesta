<div class="container-fluid">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <form class="form-horizontal" action="<?=base_url('tarif/create')?>" method="POST">
          <div class="card-body">
            <h4 class="card-title">Price Input</h4>
            <div class="form-group row">
              <label for="fdaya" class="col-sm-3 text-left control-label col-form-label">Daya</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="daya" id="fdaya" placeholder="Value of Daya Here">
              </div>
            </div>
            <div class="form-group row">
              <label for="fharga" class="col-sm-3 text-left control-label col-form-label">Harga per-KwH</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="harga" id="fharga" placeholder="Value of Harga Here">
              </div>
            </div>
          </div>
          <div class="border-top">
            <div class="card-body">
              <input type="submit" class="btn btn-info" value="Submit">
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title m-b-0">Price Table</h5>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Daya</th>
              <th scope="col">Harga</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $i = 0;
            foreach ($show as $s ) {
              $i++;?>

              <tr>
               <th scope="row"><?=$i?></th>
               <td><?=$s->daya?></td>
               <td><?=$s->harga?></td>
               <td>
                 <button type="button" class="btn btn-warning btn-sm" onclick="update(<?=$s->id_tarif?>)" data-toggle="modal" data-target="#edit">Update</button>
                 <a href="<?=base_url()?>tarif/delete/<?=$s->id_tarif?>" type="button" class="btn btn-danger btn-sm ml-1">&nbsp;Delete&nbsp;</a>
               </td>
             </tr>

             <?php } ?>


           </tbody>
         </table>
       </div>
     </div>
   </div>
 </div>

 <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title te" id="myModalLabel">Update</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <form class="form-horizontal" action="<?=base_url('tarif/updateTarif')?>" method="POST">
        <div class="modal-body">
          <input type="hidden" name="u_id" id="u_id">
          <div class="form-group row">
            <label for="fdaya" class="col-sm-3 text-left control-label col-form-label">Daya</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="daya" id="u_fdaya" placeholder="Value of Daya Here">
            </div>
          </div>
          <div class="form-group row">
            <label for="fharga" class="col-sm-3 text-left control-label col-form-label">Harga per-KwH</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="harga" id="u_fharga" placeholder="Value of Harga Here">
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
  function update(a) {
    $.ajax({
      type:"post",
      url:"<?=base_url()?>tarif/show_data/"+a,
      dataType:"json",
      success:function (data) {
        console.log(data[0].harga);
        $('#u_id').val(data[0].id_tarif);
        $('#u_fdaya').val(data[0].daya);
        $('#u_fharga').val(data[0].harga);

      }
    })
  }
</script>