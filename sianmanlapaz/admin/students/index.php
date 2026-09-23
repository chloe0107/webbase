<?php
     session_start();
    include "../../config/database.php";
    //only admin can access this page
    if(!isset($_SESSION["role"]) || $_SESSION["role"] !="admin"){
        header("Location: ../../index.php");
        exit;
    }

    $sql = "SELECT * FROM users WHERE role = 'student' ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>Students</title>

    <!-- Bootstrap CSS -->
    <link
        href="../../assets/vendor/bootstrap/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Custom CSS -->
    <link
        href="../../assets/css/style.css"
        rel="stylesheet"
    >
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">

            <a
                class="navbar-brand"
                href="dashboard.html"
            >
                Student Portal Admin
            </a>

        </div>
    </nav>

    <!-- Main Content -->
    <div class="container py-4">

        <?php if(isset($_GET["message"])){ ?>
                    <div class="alert alert-success"> <?php echo $_GET["message"];?> </div>
                <?php }?>

        <!-- Header Section -->
        <div class="d-flex justify-content-between mb-3">

            <div>
                <h2>Student Accounts</h2>

                <a href="../dashboard.php">
                    ← Dashboard
                </a>
            </div>

            <a
                class="btn btn-primary"
                href="create.php"
            >
                + Add Student
            </a>

        </div>

        <!-- Student List Card -->
        <div class="card">
            <div class="card-body">

                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th>Student No.</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        <!-- Student Record -->
                        <?php while($row = mysqli_fetch_assoc($result)){ ?>

                        <tr>
                            <td>  
                                <?php echo htmlspecialchars($row["student_no"]); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($row["full_name"]); ?>
                            </td>

                            <td>
                                 <?php echo htmlspecialchars($row["username"]); ?>
                            </td>

                            <td>
                                <a
                                    class="btn btn-success btn-sm"
                                    href="enroll.html"
                                >
                                    Enroll Subjects
                                </a>

                                <a
                                    class="btn btn-warning btn-sm"
                                    href="student_form.html"
                                >
                                    Edit
                                </a>

                                <button
                                    class="btn btn-danger btn-sm"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                        <?php } ?>

                    </tbody>

                </table>

            </div>
        </div>

    </div>

</body>

</html>