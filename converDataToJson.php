<?php
$mysqli = new mysqli('192.168.64.2','root','','cy');
$mysqli->set_charset('utf-8');

$sql = "select * from cust where 1";
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$stmt->store_result();      //資料儲存
//echo $stmt->num_rows;       //顯示幾筆
$stmt->bind_result($id,$name,$phone,$birth);  //綁定欄位

$ret = new stdClass;
if ($stmt->num_rows>0) {
    $ret->result = $stmt->num_rows;
    $rows = [];
    while ($stmt->fetch()) {
        $rows['id'] = $id;
        $rows['name'] = $name;
        $rows['phone'] = $phone;
        $rows['birth'] = $birth;

        $ret->data[] = $rows;

    }
}else{
    $ret->result = 'no data';
}

$stmt->free_result();
$stmt->close();

echo json_encode($ret);
