<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>POS System - Login</title>

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    >

</head>

<body class="bg-light">

<div class="container mt-5" style="max-width: 400px;">

    <div class="card shadow-sm p-4">

        <h3 class="text-center mb-4">
            POS Login
        </h3>


        <?php if (session()->getFlashdata('error')): ?>

            <div class="alert alert-danger">

                <?= esc(session()->getFlashdata('error')) ?>

            </div>

        <?php endif; ?>


        <?php if (session()->getFlashdata('success')): ?>

            <div class="alert alert-success">

                <?= esc(session()->getFlashdata('success')) ?>

            </div>

        <?php endif; ?>


        <form
            action="<?= base_url('index.php/loginProcess') ?>"
            method="post"
        >

            <?= csrf_field() ?>


            <div class="mb-3">

                <label
                    for="username"
                    class="form-label"
                >
                    Username
                </label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    class="form-control"
                    placeholder="Enter username"
                    required
                >

            </div>


            <div class="mb-3">

                <label
                    for="password"
                    class="form-label"
                >
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-control"
                    placeholder="Enter password"
                    required
                >

            </div>


            <button
                type="submit"
                class="btn btn-primary w-100"
            >
                Login
            </button>

        </form>

    </div>

</div>

</body>

</html>