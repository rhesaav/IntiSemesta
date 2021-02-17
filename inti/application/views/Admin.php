<div class="container-fluid">
  <div class="row">
    <div class="col-md-5">
      <div class="card">
        <form class="form-horizontal" action="<?=base_url('admin/create')?>" method="POST">
          <div class="card-body">
            <h4 class="card-title">Admin Input</h4>
            <div class="form-group row">
              <label for="ffullname" class="col-sm-3 text-left control-label col-form-label">Nama Admin</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="fullname" id="ffullname" placeholder="Value of Nama Admin Here">
              </div>
            </div>
            <div class="form-group row">
              <label for="fusername" class="col-sm-3 text-left control-label col-form-label">Username</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="username" id="fusername" placeholder="Value of Username Here">
              </div>
            </div>
            <div class="form-group row">
              <label for="fpassword" class="col-sm-3 text-left control-label col-form-label">Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" name="password" id="fpassword" placeholder="Value of Password Here">
              </div>
            </div>
            <div class="form-group row">
                  <label for="flevel" class="col-sm-3 text-left control-label col-form-label">Level</label>
                  <div class="col-sm-9">
                    <select class="select2 form-control custom-select" name="level" style="width: 100%; height:36px;">
                      <option>Select</option>
                      <?php foreach ($level as $d): ?>
                        <option value="<?=$d->id_level?>"><?=$d->nama_level?></option>
                      <?php endforeach ?>
                    </select>
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

    <div class="col-md-7">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title m-b-0">Price Table</h5>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Username</th>
              <th scope="col">Password</th>
              <th scope="col">Nama Level</th>
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
               <td><?=$s->nama_admin?></td>
               <td><?=$s->username?></td>
               <td><?=$s->password?></td>
               <td><?=$s->nama_level?></td>
               <td>
                 <button type="button" class="btn btn-warning btn-sm" onclick="update(<?=$s->id_admin?>)" data-toggle="modal" data-target="#edit">Update</button>
                 <a href="<?=base_url()?>admin/delete/<?=$s->id_admin?>" type="button" class="btn btn-danger btn-sm ml-1">&nbsp;Delete&nbsp;</a>
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
      <form class="form-horizontal" action="<?=base_url('admin/updateadmin')?>" method="POST">
        <div class="modal-body">
          <input type="hidden" name="u_id" id="u_id">
          <div class="form-group row">
            <label for="ffullname" class="col-sm-3 text-left control-label col-form-label">Nama Lengkap</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="fullname" id="u_ffullname" placeholder="Value of Nama Here">
            </div>
          </div>
          <div class="form-group row">
            <label for="fusername" class="col-sm-3 text-left control-label col-form-label">Username</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="username" id="u_fusername" placeholder="Value of Username Here">
            </div>
          </div>
          <div class="form-group row">
            <label for="fpassword" class="col-sm-3 text-left control-label col-form-label">Password</label>
            <div class="col-sm-9">
              <input type="password" class="form-control" name="password" id="u_fpassword" placeholder="Value of Password Here">
            </div>
          </div>
           <div class="form-group row">
                  <label for="fdaya" class="col-sm-3 text-left control-label col-form-label">Daya</label>
                  <div class="col-sm-9">
                    <select class="select2 form-control custom-select" id="u_flevel" name="level" style="width: 100%; height:36px;">
                      <option>Select</option>
                      <?php foreach ($level as $d): ?>
                        <option value="<?=$d->id_level?>"><?=$d->nama_level?></option>
                      <?php endforeach ?>
                    </select>
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
      url:"<?=base_url()?>admin/show_data/"+a,
      dataType:"json",
      success:function (data) {
        console.log(data[0].harga);
        $('#u_id').val(data[0].id_admin);
        $('#u_ffullname').val(data[0].nama_admin);
        $('#u_fusername').val(data[0].username);
        $('#u_fpassword').val(data[0].password);
        $('#u_flevel').val(data[0].id_level);

      }
    })
  }
</script>