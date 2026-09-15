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

                <form>

                    <!-- Student Number -->
                    <div class="mb-3">
                        <label class="form-label">
                            Student Number
                        </label>

                        <input class="form-control">
                    </div>

                    <!-- Full Name -->
                    <div class="mb-3">
                        <label class="form-label">
                            Full Name
                        </label>

                        <input class="form-control">
                    </div>

                    <!-- Username -->
                    <div class="mb-3">
                        <label class="form-label">
                            Username
                        </label>

                        <input class="form-control">
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label class="form-label">
                            Password
                        </label>

                        <input
                            type="password"
                            class="form-control"
                        >
                    </div>

                    <!-- Form Actions -->
                    <button
                        type="button"
                        class="btn btn-primary"
                    >
                        Save Student
                    </button>

                    <a
                        href="students.html"
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