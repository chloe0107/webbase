<?php
         session_start();
    include "../../config/database.php";
    //only admin can access this page
    if(!isset($_SESSION["role"]) || $_SESSION["role"] !="admin"){
        header("Location: ../../index.php");
        exit;
    }

    //to confirm is that id number exist.. shortcut of if & else condition
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id AND role='student'");
    $student = mysqli_fetch_assoc($result);
    //if ever walang mapull out, put error
    if(!$student){
        die("Student not found!");
    }
    $message = "";
    if(isset($_POST['update'])){
        $student_no = $_POST['student_no'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        //if password is blank, keep the old password
        if($_POST['password'] == ""){
            $sql = "UPDATE users SET
             student_no='$student_no',
              full_name='$full_name',
               username='$username'
                WHERE id=$id AND role='student'
            ";
        }else {
            $new_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $sql = "UPDATE users SET
             student_no='$student_no',
              full_name='$full_name',
               username='$username',
               password='$new_password'
                WHERE id=$id AND role='student'
            ";
        }
        if(mysqli_query($conn, $sql)){
            header("Location: index.php");
            exit;
        }else {
            $message = "Could not update record";
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Student</title>
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5" style="max-width:700px">
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <h2>Edit Student Account</h2>

                <?php if($message != ""){ ?>
                        <div class="alert alert-danger"> <?php echo $message; ?> </div>
                    <?php }?>

                <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Student Number</label>
                    <input type="text" name="student_no" class="form-control" value=" <?php echo htmlspecialchars($student['student_no'])?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="full_name" class="form-control" value="<?php echo htmlspecialchars($student['full_name'])?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo htmlspecialchars($student['username'])?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">New Password <span class="text-muted">(leave blank to keep old password)</span></label>
                    <input type="password" name="password" class="form-control">
                </div>
                <button type="submit" name="update" class="btn btn-primary">Update Student</button>
                <a href="index.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
