<?php
     session_start();
    include "../../config/database.php";
    //only admin can access this page
    if(!isset($_SESSION["role"]) || $_SESSION["role"] !="admin"){
        header("Location: ../../index.php");
        exit;
    }

    $message = "";
    if(isset($_POST["save"])){
        //Collect data from form

        $student_no = $_POST["student_no"];
        $full_name = $_POST["full_name"];
        $username = $_POST["username"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (student_no, full_name, username, password, role) VALUES ('$student_no', '$full_name', '$username', '$password', 'student')";

        if(mysqli_query($conn, $sql)){
            header("Location: index.php?message=Student record added successfully!");
            exit;
        }
        else{
            $message = "Could not save the student record. Try again..";
        }
    }
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>Student Form</title>

    <!-- Bootstrap CSS -->
    <link
        href="../../assets/vendor/bootstrap/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

    <!-- Main Container -->
    <div
        class="container py-5"
        style="max-width: 700px;"
    >

        <!-- Student Form Card -->
        <div class="card border-0 shadow-sm">

            <div class="card-body p-4">

                <h2>Student Account Form</h2>

                <?php if($message != ""){ ?>
                    <div class="alert alert-danger"> <?php echo $message; ?> </div>
                <?php }?>

                <form method="POST">

                    <!-- Student Number -->
                    <div class="mb-3">
                        <label class="form-label">
                            Student Number
                        </label>

                        <input class="form-control" name="student_no">
                    </div>

                    <!-- Full Name -->
                    <div class="mb-3">
                        <label class="form-label">
                            Full Name
                        </label>

                        <input class="form-control" name="full_name">
                    </div>

                    <!-- Username -->
                    <div class="mb-3">
                        <label class="form-label">
                            Username
                        </label>

                        <input class="form-control" name="username">
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label class="form-label">
                            Password
                        </label>

                        <input
                            type="password"
                            class="form-control" name="password"
                        >
                    </div>

                    <!-- Form Actions -->
                    <button
                        type="submit"
                        class="btn btn-primary"
                        name="save"
                    >
                        Save Student
                    </button>

                    <a
                        href="index.php"
                        class="btn btn-secondary"
                    >
                        Cancel
                    </a>

                </form>

            </div>

        </div>

    </div>

</body>

</html>