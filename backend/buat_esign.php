<?php
session_start();
include "../_config/config-main.php";

if (empty($_SESSION['id']) && empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=login.php'>";
}

else {
    $responese=[];
    if ($_GET['act'] == 'save') {
        $id_user = $_SESSION['id'];
        $nama_file          = $_FILES['esign']['name'];
        $ukuran_file        = $_FILES['esign']['size'];
        $tipe_file          = $_FILES['esign']['type'];
        $tmp_file           = $_FILES['esign']['tmp_name'];

        $allowed_extensions = array('png');
        $path_file          = "../e-sign/".$nama_file;
        $file               = explode(".", $nama_file);
        $extension          = array_pop($file);
        if (in_array($extension, $allowed_extensions)) {
            if($ukuran_file <= 500000) {
                if(move_uploaded_file($tmp_file, $path_file)) {
                    $res = mysqli_query($conn, "UPDATE tb_user SET esign = '$nama_file' WHERE id_user = ".$id_user) or die('Ada kesalahan pada query update : '.mysqli_error($conn));
                    if ($res) {
                        $responese['status'] = '0000';
                    } else {
                        $responese['status'] = "0001";
                    }
                } else {
                    $responese['status'] = "0002";
                }
            } else {
                $responese['status'] = "0003";
            }
        } else {
            $responese['status'] = "0004";
        }
    }  
    echo json_encode($responese); 
}
?>