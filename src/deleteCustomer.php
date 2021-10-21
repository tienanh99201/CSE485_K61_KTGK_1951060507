



<?php
include "config.php";

if(isset($_GET["id"])){


$id = $_GET["id"];
$sql ="DELETE FROM patient WHERE patientid =$id";
$result = mysqli_query($conn,$sql);

if($result==true){
    $_SESSION['delete'] = "<div class='text-success'>Xóa Thành Công.</div>";
    header("Location:details.php");
}
else{
    $_SESSION['delete'] = "<div class='text-danger'>Xóa Thất Bại.</div>";
    header("Location:user.php");

}
}
mysqli_close($conn);
?>