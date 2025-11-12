<?php
include "connect.php";
$db = koneksidatabase();
function tampilsemua(){
  global $db;
  $sql = "SELECT * FROM kumpulantabel";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $hasildata = $stmt->fetchall();
  echo "<table><tr class='trAtas'>
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
  $sql = "SELECT * FROM kumpulantabel WHERE nama = ?";
  $stmt = $db->prepare($sql);
  $stmt->bindparam(1, $datacari);
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
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylehalaman.css">
</head>
<body>
  <ul class="navigasi">
    <li><a href="halamanutama.php">input</a></li>
    <li><a href="halamandata.php">informasi data</a></li>
  </ul>
  <div class="kontiner">
    <form class="form1" action="insert.php" method="POST" enctype="multipart/form-data">
        <label for="nama">nama:</label>
        <input type="text" name="nama" id="nama">
        <label for="noinduk">noinduk:</label>
        <input type="text" name="noinduk" id="noinduk">
        <label for="jabatan">jabatan:</label>
        <input type="text" name="jabatan" id="jabatan">
        <label for="nama">status:</label>         
        <select name="status" id="status">
            <option value="non staff">non staff</option>
            <option value="staff">staff</option>
            <option value="pkl">pkl</option>
        </select>
        <label for="tglmasuk">tglmasuk:</label>
        <input type="date" name="tglmasuk" id="tglmasuk">
        <label for="file">upload file:</label>
        <input type="file" name="file" id="file">
        <button type="submit">simpan</button>
      </form>
  </div>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
      <h1>kumpulan data</h1>
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
}
} else{
  tampilsemua();
}
$db = null;
?>
</body>
</html>