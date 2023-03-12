<?php require_once '../functions/helpers.php'; ?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= asset('assets/css/style.css') ?>" />
    <title>پنل ادمین</title>
</head>

<body class="min-h-screen bg-gray-50/50 lg:flex antialiased" x-data="{open: false}">
    <!-- Sidebar -->
    <?php require_once 'layouts/sidebar.php'; ?>
    <!-- End Sidebar -->
    <div class="relative z-0 lg:flex-grow mx-4">
        <!-- Top Nav Bar -->
        <?php require_once 'layouts/navbar.php'; ?>
        <!--End Top Nav Bar -->
        <main class="h-[calc(100vh-85px)] bg-gray-100 p-4 rounded-lg">
            <section class="">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <!-- Content -->
                </div>
            </section>
        </main>
    </div>

    <script src="<?= asset('assets/js/script.js') ?>"></script>
</body>

</html>