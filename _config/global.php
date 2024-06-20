<?php
include "config-main.php";

function run_query($query)
{
	GLOBAL $conn;
	$return = false;
	$data = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($data)){
		$return[] = $row;
	}
	return $return;
}

function update_data($tableName, $columns, $whereColumns = array())
{
	GLOBAL $conn;
	$return = false;

	$primaryKeys = array();
	$query = "DESCRIBE " . $tableName;
	$result = mysqli_query($conn, $query);
	while ($result && $row = mysqli_fetch_assoc($result)) {
		if (isset($row['Key']) && isset($row['Field']) && isset($row['Extra'])) {
			if ($row['Key'] == "PRI") {
				$primaryKeys[] = $row['Field'];
			}
		}
	}

	if (count($primaryKeys) > 0) {

		$updateString = "";
		if (is_array($columns)) {

			$updateList = array();
			foreach ($columns as $column => $value) {
				if (is_string($value)) $value = "'" . mysqli_real_escape_string($conn, $value) . "'";
				$updateList[] = $column . "=" . $value;
			}
			if (count($updateList) > 0) $updateString = implode(", ", $updateList);
		} else if (is_string($columns)) {
			$updateString = $columns;
		}
		
		$whereString = "";
		if (is_array($whereColumns)) {
			
			$whereList = array();
			foreach ($whereColumns as $column => $value) {
				if (is_string($value)) $value = "'" . mysqli_real_escape_string($conn, $value) . "'";
				$whereList[] = $column . "=" . $value;
			}
			if (count($whereList) > 0) $whereString = implode(" AND ", $whereList);
		} else if (is_string($whereColumns)) {
			$whereString = $whereColumns;
		}
		
		// search matched rows
		$matchedRows = array();
		$query = "SELECT " . implode(", ", $primaryKeys) . " FROM " . $tableName;
		if (!empty($innerJoinTables)) {
			$query .= " " . $innerJoinTables;
		}
		if (!empty($whereString)) {
			$query .= " WHERE " . $whereString;
		}
		$query .= " FOR UPDATE";
		$result = mysqli_query($conn, $query);
		while ($result && $row = mysqli_fetch_assoc($result)) {
			$matchedRows[] = $row;
		}
		
		// update tableName
		$query = "UPDATE " . $tableName;
		if (!empty($innerJoinTables)) {
			$query .= " " . $innerJoinTables;
		}
		$query .= " SET ";
		$query .= $updateString;
		if (!empty($whereString)) {
			$query .= " WHERE " . $whereString;
		}
		$result = mysqli_query($conn, $query);
		if ($result) {			
			if (count($matchedRows) > 0) {
				
				$errorFound = false;
				foreach ($matchedRows as $matchedRow) {
					if (mysqli_affected_rows($conn) > 0) {
						// ok
					} else {
						$errorFound = true;
					}
				}
				
				if (!$errorFound) $return = true;
			} else {
				$return = true;
			}
		}
	}

		return $return;
}




$data = [
	'nama_lengkap' => 'ALFIAN DENY A',
    'nama_panggilan' => 'ALFI YYYYY',
];

$where = [
	'id' => '1',
];

update_data('tb_pelamar', $data, $where);

$query = "SELECT * FROM tb_pelamar";
$result = run_query($query);

// foreach ($result as $key => $value) {
// 	echo "<p>Nama Lengkap :".$value['nama_lengkap']."<br></p>";
// 	echo "<p>Nama Panggilan :".$value['nama_panggilan']."<br></p>";
// }
echo json_encode($result);


?>