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
$file_name = $_FILES['file']['name'];
// $file = $_POST["file"];




$db = koneksidatabase();
if(!empty($nama) && !empty($noinduk) && !empty($jabatan) && !empty($status) && !empty($tglmasuk) && !empty($file_name)){
    
    $sql = "UPDATE kumpulantabel SET nama= ?, noinduk= ?, jabatan=? , status=? ,tglmasuk= ?, file=?  WHERE nama='$namaget' AND noinduk ='$noindukget' AND jabatan='$jabatanget' AND status='$statusget' AND tglmasuk='$tglmasukget' AND file='$fileget'";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(1,$nama);
    $stmt->bindParam(2,$noinduk);
    $stmt->bindParam(3,$jabatan);
    $stmt->bindParam(4,$status);
    $stmt->bindParam(5,$tglmasuk);
    $stmt->bindParam(6,$file_name);
    $stmt->execute();
    unlink("uploads/$fileget");
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
        global $file_name;
        $temp_name = $_FILES['file']['tmp_name'];
        $upload_dir = 'uploads/';
        $destination = $upload_dir . $file_name;
        move_uploaded_file($temp_name, $destination);
    }
    echo "<script>
    alert('berhasil diedit')
    window.location.href = 'halamanTabel.php'
    </script>";
} else{
    echo "<script>
    alert('data tidak boleh ada yang kosong, harap isi ulang kembali')
    window.location.href = 'halamanTabel.php';
    </script>";
}
    
$db= null;
?>