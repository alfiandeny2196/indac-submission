<?php
session_start();
include "../_config/config-main.php";
include "../function/global.php";
$level = $_SESSION['level'];

if(!empty($_GET['act']) && $_GET['act'] == 'search_comp'){ 
    echo "<option value=''>-- Pilih Perusahaan Tujuan --</option>";
    $query = "SELECT * FROM tb_comp WHERE is_used = 'yes' ORDER BY id ASC";
    $res1 = mysqli_query($conn2, $query);
    while ($row = $res1->fetch_assoc()) {
        echo "<option value='" . $row['id'] . "'>".$row['com_fullname2']."</option>";
    }
} 
if(!empty($_GET['act']) && $_GET['act'] == 'search_dept'){ 
    $compTujuan = $_POST['compTujuan'];
    echo "<option value=''>-- Pilih Dept Tujuan --</option>";
    $query = "SELECT * FROM tb_dept WHERE dpt_compid = ".$compTujuan."  ORDER BY dpt_name ASC";
    $res1 = mysqli_query($conn2, $query);
    while ($row = $res1->fetch_assoc()) {
        echo "<option value='" . $row['id'] . "'><div style='align='>".$row['dpt_name']."</option>";
    }
} 

if(!empty($_GET['act']) && $_GET['act'] == 'search_format'){ 
    $deptTujuan = $_POST['deptTujuan'];
    if ($level == 'admin') {
        $where = '';
    } else if ($level == 'user_depo') {
        $where = "(type = 'depo' OR type = 'all') AND";
    } else if ($level == 'user_pusat') {
        $where = "(type = 'pusat' OR type = 'all') AND";
    }
    echo "<option value=''>-- Pilih Format --</option>";
    $query = "SELECT id_format, id_dept, nama_format, target_file FROM tb_format LEFT JOIN setting_dept_vs_format USING (id_format) WHERE ".$where." id_dept = ".$deptTujuan." ORDER BY nama_format ASC";
    $res1 = mysqli_query($conn, $query);
    while ($row = $res1->fetch_assoc()) {
        echo "<option value='" . $row['id_format'] . "#" . $row['target_file'] . "'>" . $row['nama_format'] . "</option>";
    }
}   

?>