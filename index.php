<?php


include 'koneksi.php';
?>


<html>
    <head>
    </head>
        <body>
            <form action="" method="post">
                <label>cari : </label>
                <input type="text" id="username" name="kolomcari" />
                <button type="submit" id="btncari" name="btncari"> cari</button>
            </form>
        <!--table-->
            <table  border="1" class="data-tabel" cellpadding="0">
                <thead >
                    <tr>
                        <th>NO</th>
                        <th>Nis</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                         if(isset($_POST['btncari'])){
                            $cari = $_POST['kolomcari']; 
                            $data=mysqli_query($db, "SELECT nis, nama, jenis_kelamin from siswa where nis like '%".$cari."%' or 
                                                nama like '%".$cari."%' or jenis_kelamin like '%".$cari."%'");
                        }else{
                            $data=mysqli_query($db, "SELECT nis, nama, jenis_kelamin from siswa ");
                        }
                        $no=1;
                        while($siswa = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $siswa['nis'];?></td>
                        <td><?php echo $siswa['nama'];?></td>
                        <td><?php echo $siswa['jenis_kelamin'];?></td>
                    </tr>
                    <?php
                    } ?>

                </tbody>
            </table>
        <!--penuutup table-->
        </body>
</html>