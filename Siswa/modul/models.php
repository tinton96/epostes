<?php 
if (isset($_POST['porifilUpdate'])) {
  	$password = sha1($_POST['password']);

	$gambar = @$_FILES['foto']['name'];
	if (!empty($gambar)) {
	move_uploaded_file($_FILES['foto']['tmp_name'],"../vendor/images/img_Siswa/$gambar");
	$ganti = mysqli_query($con,"UPDATE tb_siswa SET foto='$gambar' WHERE id_siswa='$_POST[ID]' ");
	}  	

    $sql= mysqli_query($con,"UPDATE tb_siswa SET nama_siswa='$_POST[nama]',password='$password',id_kelas='$_POST[kelas]',id_jurusan='$_POST[jurusan]' WHERE id_siswa='$_POST[ID]' ") or die(mysqli_error($con));
      if ($sql) {
		echo "
			<script type='text/javascript'>
			setTimeout(function () {
			swal({
			title: 'Sukses',
			text:  'Data Telah Diubah !',
			type: 'success',
			timer: 3000,
			showConfirmButton: true
			});     
			},10);  
			window.setTimeout(function(){ 
			window.location.replace('?page=profil');
			} ,3000);   
		</script>";
  }
  }
    elseif (isset($_POST['individuUpload'])) {
$allowed_ext  = array('jpg', 'png', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'rar', 'zip');
$file_name    = $_FILES['file']['name'];
@$file_ext     = strtolower(end(explode('.', $file_name)));
$file_size    = $_FILES['file']['size'];
$file_tmp     = $_FILES['file']['tmp_name'];
$subjek = $_POST['subjek'];
$nama     = time();
$date = date('Y-m-d'); 
if(in_array($file_ext, $allowed_ext) === true){
if($file_size < 3044070){
$lokasi = '../vendor/file/tugas'.'TUGAS-INDIVIDU_'.$nama.'.'.$file_ext;
move_uploaded_file($file_tmp, $lokasi);
$in = mysqli_query($con,"INSERT INTO tugas_siswa VALUES ('NULL','$_POST[id_tugas]','$subjek',$_POST[id_siswa],'','$nama','$file_ext','$file_size','$lokasi','$date','$_POST[ket]')");

if($in){

	echo "
			<script type='text/javascript'>
			setTimeout(function () {
			swal({
			title: 'Sukses',
			text:  'Data Tersimpan !',
			type: 'success',
			timer: 3000,
			showConfirmButton: true
			});     
			},10);  
			window.setTimeout(function(){ 
			window.location.replace('?page=tugas');
			} ,3000);   
		</script>";

}else{
echo '<div class="error">ERROR: Gagal upload file!</div>';
}

}else{
echo '<div class="error">ERROR: Besar ukuran file (file size) maksimal 1 Mb!</div>';
}

}else{

echo '<div class="error">ERROR: Ekstensi file tidak di izinkan!</div>';

}


  } 

    elseif (isset($_POST['kelompokUpload'])) {
$allowed_ext  = array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'rar', 'zip');
$file_name    = $_FILES['file']['name'];
@$file_ext     = strtolower(end(explode('.', $file_name)));
$file_size    = $_FILES['file']['size'];
$file_tmp     = $_FILES['file']['tmp_name'];
$subjek = $_POST['subjek'];
$nama     = time();
$date = date('Y-m-d'); 
if(in_array($file_ext, $allowed_ext) === true){
if($file_size < 3044070){
$lokasi = '../vendor/file/tugas'.'TUGAS-KELOMPOK_'.$nama.'.'.$file_ext;
move_uploaded_file($file_tmp, $lokasi);
$in = mysqli_query($con,"INSERT INTO tugas_siswa VALUES ('NULL','$_POST[id_tugas]','$subjek',$_POST[id_siswa],'$_POST[anggota]','$nama','$file_ext','$file_size','$lokasi','$date','$_POST[ket]')");

if($in){

	echo "
			<script type='text/javascript'>
			setTimeout(function () {
			swal({
			title: 'Sukses',
			text:  'Data Tersimpan !',
			type: 'success',
			timer: 3000,
			showConfirmButton: true
			});     
			},10);  
			window.setTimeout(function(){ 
			window.location.replace('?page=tugas');
			} ,3000);   
		</script>";

}else{
echo '<div class="error">ERROR: Gagal upload file!</div>';
}

}else{
echo '<div class="error">ERROR: Besar ukuran file (file size) maksimal 1 Mb!</div>';
}

}else{

echo '<div class="error">ERROR: Ekstensi file tidak di izinkan!</div>';

}


  } 

 ?>
 