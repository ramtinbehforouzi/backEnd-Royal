<?php
require_once '../../functions/helpers.php';
require_once '../../functions/pdo_connection.php';
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
                    <a class="bg-green-700 p-2 text-white rounded-md" href="<?= url('panel/category/create.php') ?>">دسته بندی جدید</a>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-right text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-200 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">#</th>
                                <th scope="col" class="px-6 py-3">نام دسته بندی</th>
                                <th scope="col" class="px-6 py-3">وضعیت</th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            global $pdo;
                            $query = "SELECT * FROM royal.categories";
                            $statement = $pdo->prepare($query);
                            $statement->execute();
                            $categories = $statement->fetchAll();
                            foreach ($categories as $category) {
                            ?>

                                <tr class="bg-white border-b  hover:bg-gray-50 ">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 "><?= $category->id  ?></th>
                                    <td class="px-6 py-4"><?= $category->title  ?></td>
                                    <td class="px-6 py-4 text-green-600"><?= $category->status ?></td>
                                    <td class=" py-4 text-right">
                                        <a href="<?= url('panel/category/edit.php?cat_id=') . $category->id ?>" class="px-6 font-medium text-blue-600 dark:text-blue-500 hover:underline">ویرایش</a>
                                        <a href="<?= url('panel/category/delete.php?cat_id=') . $category->id ?>" class="px-6 font-medium text-red-600 dark:text-red-500 hover:underline">حذف</a>
                                    </td>
                                </tr>




                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>

    <script src="<?= asset('assets/js/script.js') ?>"></script>
</body>

</html>