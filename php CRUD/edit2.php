<?php
include "connect.php";
$namaget = $_POST['namaget'];
$noindukget = $_POST['noindukget'];
$jabatanget = $_POST['jabatanget'];
$statusget = $_POST['statusget'];
$tglmasukget = $_POST['tglmasukget'];
$fileget = $_POST['fileget'];

$nama = $_POST["nama"];
$noinduk = $_POST["noinduk"];
$jabatan = $_POST["jabatan"];
$status = $_POST["status"];
$tglmasuk = $_POST["tglmasuk"];
$file = $_POST["file"];

$db = koneksidatabase();
$sql = "UPDATE kumpulantabel SET nama= ?, noinduk= ?, jabatan=? , status=? ,tglmasuk= ?, file=?  WHERE nama='$namaget' AND noinduk ='$noindukget' AND jabatan='$jabatanget' AND status='$statusget' AND tglmasuk='$tglmasukget' AND file='$fileget'";
$stmt = $db->prepare($sql);
$stmt->bindParam(1,$nama);
$stmt->bindParam(2,$noinduk);
$stmt->bindParam(3,$jabatan);
$stmt->bindParam(4,$status);
$stmt->bindParam(5,$tglmasuk);
$stmt->bindParam(6,$file);
$stmt->execute();
echo "berhasil diedit";
echo "<a href='halamanUtama.php'>kembali kemenu utama</a>";    
    
$db= null;
?>