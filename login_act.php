<?php
include "_config/config-main.php";
include "function/global.php";
if(isset($_POST['submit'])){ 
    $username = mysqli_real_escape_string($conn, stripslashes(strip_tags(htmlspecialchars(trim($_POST['username'])))));
    $password = (mysqli_real_escape_string($conn, stripslashes(strip_tags(htmlspecialchars(trim($_POST['password']))))));
    $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username='$username'")
    or die('Query Error: '.mysqli_error($conn));

	$rows  = mysqli_num_rows($query);
	if ($rows > 0) {
		$data  = mysqli_fetch_assoc($query);
        $cek_pass = password_verify($password,$data['password']);
        if ($cek_pass) {
            session_start();
            $_SESSION['id']   = $data['id_user'];
            $_SESSION['username']  = $data['username'];
            $_SESSION['password']  = $data['password'];
            $_SESSION['emp_id'] = $data['emp_id'];
            $_SESSION['level'] = $data['level'];
    
            header("Location: index.php");
        } else {
            header("Location: login.php?resp=1");
        }
	}

	else {
		header("Location: login.php?resp=0");
	}
}
?>