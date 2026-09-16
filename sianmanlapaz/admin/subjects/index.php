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

        <!-- Header Section -->
        <div class="d-flex justify-content-between mb-3">

            <div>
                <h2>Subjects</h2>

                <a href="dashboard.html">
                    ← Dashboard
                </a>
            </div>

            <a
                href="subject_form.html"
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
                        <tr>
                            <td>IT101</td>

                            <td>
                                Introduction to Computing
                            </td>

                            <td>3</td>

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

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</body>

</html>