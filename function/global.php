<?php
function cekMenuActive($params){
    if ((isset($_GET['page']) && $_GET['page'] == $params) || (isset($_GET['page_group']) && $_GET['page_group'] == $params)) echo "active";
}

function run_query($query)
{
	global $conn;
	$return = false;
	$data = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($data)){
		$return[] = $row;
	}
	return $return;
}

function secureLogin($string){
	global $conn;
	$h = htmlspecialchars(mysqli_escape_string($conn,$string));
	if (trim($h,'') == '') {
		return false;
	}
	return $h;
}

function cekLogin($username,$password) {
    global $conn; 
    $escape_username = secureLogin($username);
    $escape_password = secureLogin($password);
    $result = mysqli_query($conn,"SELECT * FROM tb_user WHERE username='$escape_username'");
    $data = mysqli_fetch_assoc($result);
    $cekpas = password_verify($escape_password,$data['password']);
    if($cekpas){
        return $data;
    }
    else {
        return false;
    }
}

function getValueOtherHost($table, $field, $value, $resfield, $path){
    global $conn2; 
        $sql = @mysqli_query($conn2, "SELECT $resfield FROM $table WHERE $field = '$value' ORDER BY $resfield DESC LIMIT 1") or die ("Err Qry #getGlobalValue");
        $r = mysqli_fetch_assoc($sql);                   
                return @$r[$resfield];
    mysqli_close();
}

function getValue($table, $field, $value, $resfield, $path){
    global $conn; 
        $sql = @mysqli_query($conn, "SELECT $resfield FROM $table WHERE $field = '$value' ORDER BY $resfield DESC LIMIT 1") or die ("Err Qry #getGlobalValue");
        $r = mysqli_fetch_assoc($sql);                   
                return @$r[$resfield];
    mysqli_close();
}

function getBulanRomawi($bulan) {
    if ($bulan == 1) {
        $bulan_r ="I";
        return $bulan_r;
    } else if ($bulan == 2) {
        $bulan_r ="II";
        return $bulan_r;
    } else if ($bulan == 3) {
        $bulan_r ="III";
        return $bulan_r;
    } else if ($bulan == 4) {
        $bulan_r ="IV";
        return $bulan_r;
    } else if ($bulan == 5) {
        $bulan_r ="V";
        return $bulan_r;
    } else if ($bulan == 6) {
        $bulan_r ="VI";
        return $bulan_r;
    } else if ($bulan == 7) {
        $bulan_r ="VII";
        return $bulan_r;
    } else if ($bulan == 8) {
        $bulan_r ="VIII";
        return $bulan_r;
    } else if ($bulan == 9) {
        $bulan_r ="IX";
        return $bulan_r;
    } else if ($bulan == 10) {
        $bulan_r ="X";
        return $bulan_r;
    } else if ($bulan == 11) {
        $bulan_r ="XI";
        return $bulan_r;
    } else if ($bulan == 12) {
        $bulan_r ="XII";
        return $bulan_r;
    } else {
        return false;
    }
    
}

function getReponse($var, $code) {
    $var['status'] = $code;
    echo json_encode($var);
}


?>