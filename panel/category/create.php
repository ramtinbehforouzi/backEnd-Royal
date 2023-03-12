<?php
require_once '../../functions/helpers.php';
require_once '../../functions/pdo_connection.php';
if (isset($_POST['title']) && $_POST['title'] !== '' && isset($_POST['description']) && $_POST['description'] !== '') {
    global $pdo;
    $query = 'INSERT INTO royal.categories SET title = ?, description = ?, created_at = NOW();';
    $statement = $pdo->prepare($query);
    $statement->execute([$_POST['title'], $_POST['description']]);
    redirect('panel/category');
};

?>
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
    <?php require_once '../layouts/sidebar.php'; ?>
    <!-- End Sidebar -->
    <div class="relative z-0 lg:flex-grow mx-4">
        <!-- Top Nav Bar -->
        <?php require_once '../layouts/navbar.php'; ?>
        <!--End Top Nav Bar -->
        <main class="h-[calc(100vh-85px)] bg-gray-100 p-4 rounded-lg">
            <section class="">
                <div class="my-3 flex justify-end items-center">
                    <a class="bg-red-700 p-2 text-white rounded-md" href="<?= url('panel/category') ?>">بازگشت</a>
                </div>
                <div class="w-full">
                    <form class="grid gap-4" action="<?= url('panel/category/create.php') ?>" method="post">
                        <div class="grid gap-2 w-1/3">
                            <label for="title">عنوان</label>
                            <input class="p-2 rounded-md ring-1" type="text" placeholder="عنوان دسته بندی را وارد کنید" id="title" name="title" />
                        </div>
                        <div class="grid gap-2 w-1/3">
                            <label for="description">توضیحات دسته بندی</label>
                            <textarea class="p-2" name="description" id="description" cols="30" rows="10"></textarea>
                        </div>
                        <button class="bg-green-700 p-2 text-white rounded-md w-40">ساخت دسته بندی</button>
                    </form>
                </div>
            </section>
        </main>
    </div>

    <script src="<?= asset('assets/js/script.js') ?>"></script>
</body>

</html>