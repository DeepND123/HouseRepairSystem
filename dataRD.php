<?php
session_start();
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data read</title>
</head>

<body>
<?php

$conn=mysqli_connect('localhost','root','','repair_helper');

if($conn){

$queSearch="SELECT * FROM work_upload";

if(mysqli_query($conn,$queSearch)){

$resWork=mysqli_query($conn,$queSearch);

if(mysqli_num_rows($resWork)>0){

echo '<table width="95%" border="0" cellpadding="10"
cellspacing="0" align="center">
<tr>
<th >work ID</th>
<th>image_nm</th>
<th >Uploaded work</th>
<th >Tech ID</th>
<th >Description</th>
<th >Uploaded Date</th>
</tr>';

while($dT=mysqli_fetch_assoc($resWork)){

$wid=$dT["workID"];
$img=$dT["img_nm"];
$uw=$dT["Uploaded_Work"];
$tid=$dT["tec_email"];
$des=$dT["description"];
$ud=$dT["uploadedDate"];

echo '<tr>
<td>'.$wid.'</td>
<td>'.$img.'</td>
<td><img src="getPh.php?wid=' . $wid . '&tid=' . $tid . '" width="100" /></td>
<td>'.$tid.'</td>
<td>'.$des.'</td>
<td>'.$ud.'</td>


</tr>';

}

echo '</table>';

}
else{
echo '<h2>RESULT NOT FOUND</h2>There are no any work uploaded!';
}

}

else{
echo 'The give Execution was Terminated!'.mysqli_error($conn,$queSearch);
}



}
?>
</body>
</html>