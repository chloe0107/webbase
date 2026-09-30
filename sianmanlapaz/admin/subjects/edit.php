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
    $result = mysqli_query($conn, "SELECT * FROM subjects WHERE id=$id");
    $subject = mysqli_fetch_assoc($result);
    //if ever walang mapull out, put error
    if(!$subject){
        die("Subject not found!");
    }
    $message = "";
    if(isset($_POST['update'])){
        $subject_code = $_POST['subject_code'];
        $subject_name = $_POST['subject_name'];
        $units = $_POST['units'];
        $sql = "UPDATE subjects SET
             subject_code='$subject_code',
              subject_name='$subject_name',
               units='$units'
                WHERE id=$id
            ";
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
    <title>Edit Subject</title>
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5" style="max-width:700px">
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <h2>Edit Subject Form</h2>

                <?php if($message != ""){ ?>
                        <div class="alert alert-danger"> <?php echo $message; ?> </div>
                    <?php }?>

                <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Subject Code</label>
                    <input type="text" name="subject_code" class="form-control" value=" <?php echo htmlspecialchars($subject['subject_code'])?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Subject Name</label>
                    <input type="text" name="subject_name" class="form-control" value="<?php echo htmlspecialchars($subject['subject_name'])?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Units</label>
                    <input type="text" name="units" class="form-control" value="<?php echo htmlspecialchars($subject['units'])?>" required>
                </div>
                <button type="submit" name="update" class="btn btn-primary">Update Subject</button>
                <a href="index.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>

