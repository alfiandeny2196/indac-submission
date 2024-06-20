<?php
session_start();
include "../_config/config-main.php";
include "../function/global.php";
if (empty($_SESSION['id']) && empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=login.php'>";
}

else {
    if ($_GET['act'] == 'get') {
        $data = [];
        $id_user = $_SESSION['id'];
        $user = $_SESSION['username'];
        $query = $conn->query("SELECT * FROM (SELECT
                                id_format, kode_dokumen, tanggal, comp_tujuan, dept_tujuan, hal, creator, created
                                FROM
                                tb_call_memo
                                WHERE creator = '$user'
                                UNION
                                SELECT
                                id_format, kode_dokumen, tanggal, comp_tujuan, dept_tujuan, hal, creator, created
                                FROM
                                tb_ba
                                WHERE creator = '$user') doc
                                JOIN tb_format USING (id_format) ORDER BY nama_format ASC, kode_dokumen DESC");
        $no = 1;
        while ($row = $query->fetch_array()) {
            $dept_tujuan = getValueOtherHost('tb_dept', 'id', $row['dept_tujuan'], 'dpt_name', '');
            $aksi = "<button type='button' alt='view data' data-toggle='modal' data-placement='top' title='VIEW DATA' class = 'btn btn-info'  data-target='#modal-xl'><i class='fas fa-file-alt'></i></button>";
            $data[] = array(
                "no" => $no,
                "nama_format" => $row['nama_format'],
                "kode_dokumen" => $row['kode_dokumen'],
                "tanggal" => $row['tanggal'],
                "dept_tujuan" => $dept_tujuan,
                "hal" => $row['hal'],
                "creator" => $row['creator'],
                "created" => $row['created'],
                "aksi" => $aksi,
            );
            $no++;
        }
        echo json_encode($data);
    }
}
?>