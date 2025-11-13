<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="stylehalamanForm.css">
    </head>
<body>
  <div class="nav">
    <ul class="navigasi">
      <li><a href="halamanForm.php">input</a></li>
      <li><a href="halamanTabel.php">informasi data</a></li>
    </ul>
  </div>
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
</body>
</html>