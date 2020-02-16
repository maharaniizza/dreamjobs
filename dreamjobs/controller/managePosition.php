<?php
include_once("../config/DB.php");



$action=$_POST['action'];
if($action=="addPosition"){
    $position=$_POST['position'];
    $prefix="POS";
    $idcatch="0";
    
    $date="select curdate() as datenow";
        $res=$conn->query($date);
       	$tempdate=$res->fetch_assoc();
       	$now=$tempdate['datenow'];
       
    $queryid="select PositionID from msposition";
    $resultid=$conn->query($queryid);
    
    
    if($resultid->num_rows>0){
    $queryget="select cast(substring(PositionID,4,3) as int)+ 1 as PositionID from msposition order
    by PositionID desc limit 1";
    $resultget=$conn->query($queryget);
    $temp=$resultget->fetch_assoc();
    $idcatch=$temp['PositionID'];
    }
    $admin=$_GET['userid'];

    $newID=sprintf("%'03d", $idcatch);
    $idFix= $prefix . '' . $newID;

    $query="INSERT INTO msposition (PositionName,PositionID,CreatedDate,CreatedBy) values('$position','$idFix','$now','$admin')";
    
    $conn->query($query);
    header("location:../Cpositions.php");
}

else if($action="addSkill"){
    $PositionID=$_GET['PositionID'];
    $SkillID=$_POST['skill'];
    $currentTimeinSeconds=time();
    $date=date('Y-m-d', $currentTimeinSeconds);
    $query="INSERT INTO trpositionskilldetail (SkillID,PositionID,CreatedDate)values('$SkillID','$PositionID','$date')";
    $conn->query($query);
    header("location:../Cpositions.php");

}



?>