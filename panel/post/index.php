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
                    <a class="bg-green-700 p-2 text-white rounded-md" href="<?= url('panel/post/create.php') ?>">پست جدید</a>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-right text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-200 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">#</th>
                                <th scope="col" class="px-6 py-3">نام مطلب</th>
                                <th scope="col" class="px-6 py-3">عکس</th>
                                <th scope="col" class="px-6 py-3">دسته بندی</th>
                                <th scope="col" class="px-6 py-3">وضعیت</th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            global $pdo;
                            $query = "SELECT royal.posts.*, royal.categories.title AS category_title FROM royal.posts LEFT JOIN royal.categories ON royal.posts.cat_id = royal.categories.id";
                            $statement = $pdo->prepare($query);
                            $statement->execute();
                            $posts = $statement->fetchAll();
                            foreach ($posts as $post) {
                            ?>

                                <tr class="bg-white border-b  hover:bg-gray-50 ">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 "><?= $post->id  ?></th>
                                    <td class="px-6 py-4"><?= $post->title  ?></td>
                                    <td class="px-6 py-4">
                                        <img style="width: 90px;" src="<?= asset($post->image) ?>" alt="" srcset="">
                                    </td>
                                    <td class="px-6 py-4"><?= $post->category_title ?></td>
                                    <td class="px-6 py-4 text-green-600">
                                        <?php if($post->status == 1) { ?>
                                            <span class="text-green-700">فعال</span>
                                        <?php } else { ?>
                                            <span class="text-red-700">غیرفعال</span>
                                        <?php } ?>
                                        
                                        
                                    </td>
                                    <td class=" py-4 text-right">
                                        <a href="<?= url('panel/post/delete.php?cat_id=') . $post->id ?>" class="px-6 font-medium text-yellow-600 hover:underline">تغییر وضعیت</a>
                                        <a href="<?= url('panel/post/edit.php?cat_id=') . $post->id ?>" class="px-6 font-medium text-blue-600 dark:text-blue-500 hover:underline">ویرایش</a>
                                        <a href="<?= url('panel/post/delete.php?cat_id=') . $post->id ?>" class="px-6 font-medium text-red-600 dark:text-red-500 hover:underline">حذف</a>
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