
        <div class="content-wrapper">
             <h4> <b>User</b> <small class="text-muted">/ TambahKaryawan</small>
    </h4>
    <hr>
          <div class="row">
            <div class="col-md-6 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Form Tambah Karyawan</h4>
                      <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label>NIK</label>
                          <input name="nis" type="text" class="form-control" placeholder="NIS/NISN" maxlength="15" onkeypress="return hanyaAngka(event)" required>
                        </div>
                        <div class="form-group">
                          <label>Nama Lengkap Karyawan</label>
                          <input name="nama" type="text" class="form-control" placeholder="Nama Lengkap" required>
                        </div>

                    <div class="form-group">
                      <div class="form-radio form-radio-flat">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="jk" id="lk" value="L" checked>
                         Laki-laki
                        </label>
                      </div>
                      <div class="form-radio form-radio-flat">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="jk" id="pr" value="P">
                          Perempuan
                        </label>
                      </div>
                    </div>
                    

                <div class="form-group">
                  <label for="kelas">Kelas Karyawan</label>
                  <select class="form-control" required id="kelas" name="kelas">
                  <option value=''>-- Pilih --</option>
                  <?php
                  $sqlKelas=mysqli_query($con, "SELECT * FROM tb_master_kelas ORDER BY id_kelas DESC");
                  while($kelas=mysqli_fetch_array($sqlKelas)){
                  echo "<option value='$kelas[id_kelas]'>$kelas[kelas]</option>";
                  }
                  ?>
                  </select>
                </div>

                      <div class="form-group">
                  <label for="jurusan">Bagian</label>
                  <select class="form-control" required id="jurusan" name="jurusan">
                  <option value=''>-- Pilih --</option>
                  <?php
                  $sqlJurusan=mysqli_query($con, "SELECT * FROM tb_master_jurusan ORDER BY id_jurusan DESC");
                  while($jur=mysqli_fetch_array($sqlJurusan)){
                  echo "<option value='$jur[id_jurusan]'>$jur[jurusan]</option>";
                  }
                  ?>
                  </select>
                </div>

                   <!--      <div class="form-group">
                          <label>Password</label>
                          <p>
                            <em class="text-danger">Pasword Default guru adalah NIS</em>
                          </p>
                          <input name="password" type="password" class="form-control" placeholder="Password">
                        </div> -->

                        <div class="form-group">
                          <label>Foto</label>
                          <input name="foto" type="file" class="form-control" required>
                        </div>

                        <button name="saveGuru" type="submit" class="btn btn-success mr-2">Submit</button>
                        <button onclick='goBack()' class="btn btn-light">Cancel</button>
                      </form>

                      <?php 

                      if (isset($_POST['saveGuru'])) {

                    $pass= sha1($_POST['nis']);
                    $sumber = @$_FILES['foto']['tmp_name'];
                    $target = '../vendor/images/img_Siswa/';
                    $nama_gambar = @$_FILES['foto']['name'];
                    $pindah = move_uploaded_file($sumber, $target.$nama_gambar);
                    $date = date('Y-m-d');

                    if ($pindah) {
                    $save= mysqli_query($con,"INSERT INTO tb_siswa VALUES(NULL,'$_POST[nis]','$_POST[nama]','$_POST[jk]','$pass','off','Y','0','$nama_gambar','$_POST[kelas]','$_POST[jurusan]','Yes')");
                    if ($save) {
                    echo " <script>
                    alert('Data Berhasil disimpan !');
                    window.location='?page=siswa';
                    </script>";
                    }
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
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	</script>
<script>
		function goBack() {
		  window.history.back();
		}
	</script>
