<?php

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "yourdb";
$limitStart = $_POST['limitStart'];
$limitCount = 100;
if(isset($limitStart ) || !empty($limitStart)) {
$con = mysqli_connect($hostname, $username, $password, $dbname);
$query = "SELECT CURRENT_TEMPERATURE_TABLE_ID, TEMPERATURE,CUR_TIME  FROM current_temperature_inf limit $limitStart, $limitCount";
$result = mysqli_query($con, $query);
$res = array();
while($resultSet = mysqli_fetch_assoc($result)) {

$res[$resultSet['CURRENT_TEMPERATURE_TABLE_ID']] = array('temp'=>$resultSet['TEMPERATURE'],'cuti'=>$resultSet['CUR_TIME']);

}
echo json_encode($res);
}
?>
