<?php 
$edit= mysqli_query($con,"SELECT * FROM tb_guru WHERE id_guru='$_GET[id]' ");
foreach ($edit as $d) ?>
        <div class="content-wrapper">
             <h4> <b>User</b> <small class="text-muted">/ Edit Supervisor</small>
    </h4>
    <hr>
          <div class="row">
            <div class="col-md-6 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Form Edit Supervisor</h4>
                      <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label>Nip</label>
                          <input type="hidden" name="ID" value="<?=$d['id_guru'] ?>">
                          <input name="nip" type="text" class="form-control" value="<?=$d['nik'] ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label>Nama Lengkap & Gelar</label>
                          <input name="nama" type="text" class="form-control" value="<?=$d['nama_guru'] ?>">
                        </div>

                        <div class="form-group">
                          <label>Email</label>
                          <input name="email" type="text" class="form-control" value="<?=$d['email'] ?>">
                        </div>

                     <!--    <div class="form-group">
                          <label>Password</label>
                          
                          <input name="password" type="password" class="form-control" placeholder="Password">
                        </div> -->

                        <div class="form-group">
                          <label>Foto</label>
                          <input name="foto" type="file" class="form-control" required>
                        </div>

                        <button name="updateGuru" type="submit" class="btn btn-success mr-2">Submit</button>
                       <button onclick='goBack()' class="btn btn-light">Cancel</button>
                      </form>

                      <?php 

                      if (isset($_POST['updateGuru'])) {

                    $pass= sha1($_POST['nip']);
                   
                    $date = date('Y-m-d');

                      $gambar = @$_FILES['foto']['name'];
  if (!empty($gambar)) {
  move_uploaded_file($_FILES['foto']['tmp_name'],"../vendor/images/img_Guru/$gambar");
  $ganti = mysqli_query($con,"UPDATE tb_guru SET foto='$gambar' WHERE id_guru='$_POST[ID]' ");
  } 
                    $edit= mysqli_query($con,"UPDATE tb_guru SET nama_guru='$_POST[nama]',email='$_POST[email]' WHERE id_guru='$_POST[ID]' ");
                    if ($edit) {
                    echo " <script>
                    alert('Data Berhasil diubah !');
                    window.location='?page=guru';
                    </script>";
                    }
                  


                    }

                       ?> 

                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
<script>
		function goBack() {
		  window.history.back();
		}
	</script>