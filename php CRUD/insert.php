<?php
include 'connect.php';

try {
    $db = koneksidatabase();

    $nama = $_POST["nama"];
    $noinduk = $_POST["noinduk"];
    $jabatan = $_POST["jabatan"];
    $status = $_POST["status"];
    $tglmasuk = $_POST["tglmasuk"];
    $file = $_POST["file"];

    $sql = "INSERT INTO kumpulantabel (nama, noinduk, jabatan, status, tglmasuk, file) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(1, $nama);
    $stmt->bindParam(2, $noinduk);
    $stmt->bindParam(3, $jabatan);
    $stmt->bindParam(4, $status);
    $stmt->bindParam(5, $tglmasuk);
    $stmt->bindParam(6, $file);
    $stmt->execute(); 
    echo "berhasil ditambahkan";

} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
echo "<a href='halamanUtama.php'>kembali kemenu utama</a>";
$db = null
?>