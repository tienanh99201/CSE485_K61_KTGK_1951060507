<?php
include "config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Admin</title>
</head>

<body>
    <div class="main">
        <div class="container">
            <h4>Thêm dữ liệu </h4>

            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-2">
                        <label for="patient_Name">Tên</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="patient_Name" name="patient_Name">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <label for="patient_name2">Họ Đệm</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="patient_name2" name="patient_name2">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <label for="patient_birth">Ngày Sinh</label>
                    </div>
                    <div class="col-md-10">
                        <input type="date" class="form-control" id="patient_birth" name="patient_birth">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label for="patient_gender">Giới Tính</label>
                    </div>
                    <div class="col-md-10">
                        <input type="number" class="form-control" id="patient_gender" name="patient_gender">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label for="patient_sdt">Số điện thoại</label>
                    </div>
                    <div class="col-md-10">
                        <input type="tel" class="form-control" id="patient_sdt" name="patient_sdt">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <label for="patient_email">Email</label>
                    </div>
                    <div class="col-md-10">
                        <input type="email" class="form-control" id="patient_email" name="patient_email">
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-2">
                        <label for="patient_height">Chiều Cao</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="patient_height" name="patient_height">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label for="patient_weight">Cân nặng</label>
                    </div>
                    <div class="col-md-10">
                        <input type="number" class="form-control" id="patient_weight" name="patient_weight">
                    </div>
                </div>







                <div class="row">
                    <div class="col-md-2">
                        <label for="">Nhóm Máu</label>
                    </div>
                    <div class="col-md-10">
                        <select name="blood_type" id="blood_type">
                            <?php
                            $sql = "SELECT * FROM patient";
                            $result = mysqli_query($conn,$sql);

                            if(mysqli_num_rows($result)){
                                while($row=mysqli_fetch_assoc($result)){
                                 echo '<option value="'.$row['blood_type'].'">'.$row['blood_type'].'</option>';
                                } 
                            }                  

                         ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <label for=""></label>
                    </div>
                    <div class="col-md-10">
                        <button type="submit" name="submit" class="btn btn-success">Lưu Lại</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>



</body>

</html>


<!-- phần xử lý -->

<?php
 if(isset($_POST['submit'])){


$pt_name = $_POST['patient_Name'];
$pt_name2 = $_POST['patient_name2'];
$pt_birth = $_POST['patient_birth'];
$pt_gen = $_POST['patient_gender'];
$pt_sdt= $_POST['patient_sdt'];
$pt_email= $_POST['patient_email'];
$pt_height= $_POST['patient_height'];
$pt_weight= $_POST['patient_weight'];
$pt_blood= $_POST['blood_type'];




$sql = "INSERT INTO patient (firstname, lastname, dateofbirth, gender, mobile, email, height, weight , blood_type)
        VALUES ('$pt_name','$pt_name2','$pt_birth ','$pt_gen','$pt_sdt','$pt_email','$pt_height','$pt_weight','$pt_blood')";
 
    $_result = mysqli_query($conn,$sql);

    if($_result>0){
        $_SESSION['add'] = "<div class='text-success'>Thêm Thành Công</div>";
        header("Location: src/details.php");
    }
    else{
        $_SESSION['add'] = "<div class='text-danger'>Thêm Thất Bại</div>";
        header("Location:employees.php");
    }
}
    mysqli_close($conn);
?>