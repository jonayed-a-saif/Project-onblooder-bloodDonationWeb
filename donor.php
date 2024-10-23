<?php 
$conn = mysqli_connect("localhost","root","","onblooder") or die("Couldn't connect");


if($_POST['type'] == ""){

    $sql = "SELECT * FROM divisions";

    $query  = mysqli_query($conn,$sql) or die("Couldn't connect");
    
    $str="";
    
    
    while($row = mysqli_fetch_array($query)){
        $str .= "<option value= '{$row['id']}'>{$row['name']}</option>";
    
    }
    
    


}else if($_POST['type'] == "stateData"){


    $sql = "SELECT * FROM districts WHERE division_id  = {$_POST['id']}";

    $query  = mysqli_query($conn,$sql) or die("Couldn't connect");
    
    $str="";
    
    
    while($row = mysqli_fetch_array($query)){
        $str .= "<option value= '{$row['id']}'>{$row['district_name']}</option>";
    
    }

   

}else if($_POST['type'] == "unionData"){


    $sql = "SELECT * FROM upazilas WHERE district_id   = {$_POST['id']}";

    $query  = mysqli_query($conn,$sql) or die("Couldn't connect");
    
    $str="";
    
    
    while($row = mysqli_fetch_array($query)){
        $str .= "<option value= '{$row['id']}'>{$row['name']}</option>";
    
    }

   

}


echo $str;
?>