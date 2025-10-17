<?php
include "connect.php";
$db = koneksidatabase();
function tampilsemua(){
  global $db;
  $sql = "SELECT * FROM kumpulantabel";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $hasildata = $stmt->fetchall();
  echo "<table><tr>
      <th>nama</th>
      <th>noinduk</th>
      <th>jabatan</th>
      <th>status</th>
      <th>tglmasuk</th>
      <th>file</th>
      <th>edit</th>
      <th>delete</th>
    </tr>";
  foreach($hasildata as $tabel){
      echo "
    <tr>
      <th>$tabel[nama]</th>
      <th>$tabel[noinduk]</th>
      <th>$tabel[jabatan]</th>
      <th>$tabel[status]</th>
      <th>$tabel[tglmasuk]</th>
      <th><img src='uploads/{$tabel['file']}' alt='$tabel[file]' width='100px'></th>
      <th><a href='edit.php?nama={$tabel['nama']}&noinduk={$tabel['noinduk']}&jabatan={$tabel['jabatan']}&status={$tabel['status']}&tglmasuk={$tabel['tglmasuk']}&file={$tabel['file']}'>Edit</a></th>
      <th><a href='hapus.php?nama={$tabel['nama']}&noinduk={$tabel['noinduk']}&jabatan={$tabel['jabatan']}&status={$tabel['status']}&tglmasuk={$tabel['tglmasuk']}&file={$tabel['file']}'>Hapus</a></th>
    </tr>";

  };
  echo "</table>";
  $db = null;
}
function caritampil($datacari){
  global $db;
  $sql = "SELECT * FROM kumpulantabel WHERE nama = '$datacari'";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $hasildata = $stmt->fetchall();
  $kumpulantabel = $db->query($sql);
  echo "<table><tr>
      <th>nama</th>
      <th>noinduk</th>
      <th>jabatan</th>
      <th>status</th>
      <th>tglmasuk</th>
      <th>file</th>
      <th>edit</th>
      <th>delete</th>
    </tr>";
  foreach($kumpulantabel as $tabel){
      echo "
    <tr>
      <th>$tabel[nama]</th>
      <th>$tabel[noinduk]</th>
      <th>$tabel[jabatan]</th>
      <th>$tabel[status]</th>
      <th>$tabel[tglmasuk]</th>
      <th><img src='uploads/{$tabel['file']}' alt='$tabel[file]' width='100px'></th>
      <th><a href='edit.php?nama={$tabel['nama']}&noinduk={$tabel['noinduk']}&jabatan={$tabel['jabatan']}&status={$tabel['status']}&tglmasuk={$tabel['tglmasuk']}&file={$tabel['file']}'>Edit</a></th>
      <th><a href='hapus.php?nama={$tabel['nama']}&noinduk={$tabel['noinduk']}&jabatan={$tabel['jabatan']}&status={$tabel['status']}&tglmasuk={$tabel['tglmasuk']}&file={$tabel['file']}'>Hapus</a></th>
    </tr>";
  };
  echo "</table>";
  $db = null;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
    </style>
</head>
<body>
    <form action="insert.php" method="POST">
        <label for="nama">nama:</label></br>
        <input type="text" name="nama" id="nama"></br>
        <label for="noinduk">noinduk:</label></br>
        <input type="text" name="noinduk" id="noinduk"></br>
        <label for="jabatan">jabatan:</label></br>
        <input type="text" name="jabatan" id="jabatan"></br>
        <label for="nama">status:</label></br>         
        <select name="status" id="status">
            <option value="non staff">non staff</option>
            <option value="staff">staff</option>
            <option value="pkl">pkl</option>
        </select></br>
        <label for="tglmasuk">tglmasuk:</label></br>
        <input type="date" name="tglmasuk" id="tglmasuk"></br>
        <label for="file">upload file:</label></br>
        <input type="file" name="file" id="file"></br>
        <button type="submit">simpan</button>
        <h1>kumpulan data</h1>
    </form>   
    <form action="" method="POST">
      <label for="nama">nama:</label>
      <input type="text" name="nama" id="nama">
      <button>cari/refresh</button>
    </form>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['nama'])){
  $hasilcari = $_POST['nama'];
  $ada = false;
  global $db;
  $sql = "SELECT nama FROM kumpulantabel";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $hasildata = $stmt->fetchall();
  $kumpulantabel = $db->query($sql);
  foreach($kumpulantabel as $cari){
    $data;
    if ($cari['nama'] == $hasilcari){
      global $data;
      $data = true;
      break;
    } else {
      global $data;
      $data = false;
    } 
} 
if ($data){
  caritampil($hasilcari);
} else{
  echo "tidak ada data yang dicari";
  tampilsemua();
}
} else{
  tampilsemua();
}
?>
</body>
</html>