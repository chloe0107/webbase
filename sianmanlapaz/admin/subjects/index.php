<?php
     session_start();
    include "../../config/database.php";
    //only admin can access this page
    if(!isset($_SESSION["role"]) || $_SESSION["role"] !="admin"){
        header("Location: ../../index.php");
        exit;
    }

    $sql = "SELECT * FROM `subjects`";
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

    <title>Subjects</title>

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
                <h2>Subjects</h2>

                <a href="../dashboard.php">
                    ← Dashboard
                </a>
            </div>

            <a
                href="create.php"
                class="btn btn-primary"
            >
                + Add Subject
            </a>

        </div>

        <!-- Subjects List Card -->
        <div class="card">

            <div class="card-body">

                <table class="table">

                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Subject Name</th>
                            <th>Units</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        <!-- Subject Record -->
                          <?php while($row = mysqli_fetch_assoc($result)){ ?>

                        <tr>
                            <td>
                                <?php echo htmlspecialchars($row["subject_code"]); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($row["subject_name"]); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($row["units"]); ?>
                            </td>

                            <td>
                                <a
                                    href="subject_form.html"
                                    class="btn btn-warning btn-sm"
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