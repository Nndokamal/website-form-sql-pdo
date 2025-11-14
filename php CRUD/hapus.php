<?php
include "connect.php";
$nama = $_GET['nama'];
$noinduk = $_GET['noinduk'];
$jabatan = $_GET['jabatan'];
$status = $_GET['status'];
$tglmasuk = $_GET['tglmasuk'];
$file = $_GET['file'];
$db = koneksidatabase();
$sql = "DELETE FROM kumpulantabel WHERE nama = ? AND noinduk = ? AND jabatan = ? AND status = ? AND tglmasuk = ? AND file = ?";
$stml = $db->prepare($sql);
$stml->bindParam(1,$nama);
$stml->bindParam(2,$noinduk);
$stml->bindParam(3,$jabatan);
$stml->bindParam(4,$status);
$stml->bindParam(5,$tglmasuk);
$stml->bindParam(6,$file);
$stml->execute();

unlink("uploads/$file");
echo "<script>
alert('hapus berhasil');
window.location.href = 'halamanTabel.php';
</script>";
$db = null;
?>