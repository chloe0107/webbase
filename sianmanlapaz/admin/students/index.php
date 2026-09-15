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

        <!-- Header Section -->
        <div class="d-flex justify-content-between mb-3">

            <div>
                <h2>Student Accounts</h2>

                <a href="dashboard.html">
                    ← Dashboard
                </a>
            </div>

            <a
                class="btn btn-primary"
                href="student_form.html"
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
                        <tr>
                            <td>2026-0001</td>

                            <td>
                                Juan Dela Cruz
                            </td>

                            <td>
                                juan
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

                    </tbody>

                </table>

            </div>
        </div>

    </div>

</body>

</html>