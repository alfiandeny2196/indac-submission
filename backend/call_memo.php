<?php
session_start();
include "../_config/config-main.php";
include "../function/global.php";
if (empty($_SESSION['id']) && empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=login.php'>";
}

else {
    $response=[];
    $data = json_decode(file_get_contents('php://input'), true);
    if ($_GET['act'] == 'save') {
        $id_user = $_SESSION['id'];
        $creator = $_SESSION['username'];
        $created = date('Y-m-d H:i:s');

        $tanggal = $data['tanggal'];
        $hal = $data['hal'];
        $dept_tujuan = $data['dept_tujuan'];
        $comp_tujuan = $data['comp_tujuan'];
        $dept_depo = $data['dept_depo'];
        $isi = $data['isi'];
        $id_format = $data['format'];

        $bulan = explode("-", $tanggal)[1];
        $tahun = explode("-", $tanggal)[0];
        
        $bulan_r = getBulanRomawi($bulan);
        $prefix = getValue('tb_format', 'id_format', $id_format, 'prefix', '');
        $user_prefix = getValue('tb_user', 'id_user', $id_user, 'user_prefix', '');

        $q_code = "/".$prefix."/".$user_prefix."/".$bulan_r."/".$tahun;

        $query = $conn->query("SELECT max(SUBSTRING(kode_dokumen, 1,3)) as kodeTerbesar FROM tb_call_memo WHERE kode_dokumen LIKE '%".$q_code."%'");
        $data = $query->fetch_assoc();
        $kodeDokumen = (int) $data['kodeTerbesar'];
        $kodeDokumen++;
        $kode_dokumen = sprintf("%03s", $kodeDokumen).$q_code;
        
        $conn->query("SET autocommit=0");
		$conn->query("BEGIN");

        $res = $conn->query("INSERT INTO tb_call_memo (kode_dokumen,id_format, tanggal, comp_tujuan, dept_tujuan, dept_depo, hal, isi, creator, created) VALUES ('$kode_dokumen','$id_format', '$tanggal', '$comp_tujuan', '$dept_tujuan', '$dept_depo', '$hal', '$isi', '$creator', '$created')");
        
        if (!$res) {
            getReponse($response, "0001");
            return false;
        } else {
            $ref_id = $conn->insert_id;
            $res = $conn->query("SELECT * FROM setting_apv_per_format WHERE id_user = ".$id_user." AND id_format = ".$id_format);
            $row = $res->fetch_assoc();
            $apv1 = $row['apv1'];
            $apv2 = $row['apv2'];
            $apv3 = $row['apv3'];
            $apv4 = $row['apv4'];
            $apv5 = $row['apv5'];

            $res2 = $conn->query("INSERT INTO tb_apv_detail (ref_tb, ref_id, apv1, apv2, apv3, apv4, apv5) VALUES ('tb_call_memo', '$ref_id', '$apv1', '$apv2', '$apv3', '$apv4', '$apv5')");

            if ($res2) {
                getReponse($response, "0002");
                return false;
            } else {
                getReponse($response, "0000");
            }
        }
        $conn->query("COMMIT");
		$conn->query("SET autocommit=1");
    } 
}
?>