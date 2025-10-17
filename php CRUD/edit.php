<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="edit2.php" method="POST" enctype="multipart/form-data">
        <h1>data sebelum:</h1>
        nama: </br> <input type="text" name="namaget" value="<?php echo $_GET['nama'] ?>" readonly></br>
        noinduk: </br> <input type="text" name="noindukget" value="<?php echo $_GET['noinduk'] ?>" readonly></br>
        jabatan: </br> <input type="text" name="jabatanget" value="<?php echo $_GET['jabatan'] ?>" readonly></br>
        status: </br> <input type="text" name="statusget" value="<?php echo $_GET['status'] ?>" readonly></br>
        tglmasuk: </br> <input type="text" name="tglmasukget" value="<?php echo $_GET['tglmasuk'] ?>" readonly></br>
        file: </br> <input type="text" name="fileget" value="<?php echo $_GET['file'] ?>" readonly> </br>
        <img src="uploads/<?php echo $_GET['file'] ?>"width='100px'>

        <h1>data setelah:</h1>
        nama:</br> <input type="text" name="nama"></br>
        noinduk:</br> <input type="text" name="noinduk"></br>
        jabatan:</br> <input type="text" name="jabatan"></br>
        status:</br>
        <select name="status" id="status">
            <option value="non staff">non staff</option>
            <option value="staff">staff</option>
            <option value="pkl">pkl</option>
        </select></br>
        tglmasuk:</br> <input type="date" name="tglmasuk" id="tglmasuk"></br>
        file:</br> <input type="file" name="file" id="file"></br> 
        <button type="submit">submit</button>
    </form>
</body>
</html>
<?php
?>