<?php
    require_once '../../functions/helpers.php';
    require_once '../../functions/pdo_connection.php';

    if(
        isset($_POST['title']) && $_POST['title'] !== '' 
    && isset($_POST['cat_id']) && $_POST['cat_id'] !== '' 
    &&  isset($_POST['body']) && $_POST['body'] !== ''
    &&  isset($_FILES['image']) && $_FILES['image']['name'] !== '' ){

        global $pdo;

        $query = 'SELECT * FROM royal.categories WHERE id = ?';
        $statement = $pdo->prepare($query);
        $statement->execute([$_POST['cat_id']]);
        $category = $statement->fetch();
        
        $allowedMimes = ['png', 'jpeg', 'jpg', 'gif'];
        $imageMime = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        if(!in_array($imageMime, $allowedMimes))
        {
            redirect('panel/post');
        }
        $basePath = dirname(dirname(__DIR__));
        $image = '/assets/images/posts/' . date("Y_m_d_H_i_s") . '.' . $imageMime;
        $image_upload = move_uploaded_file($_FILES['image']['tmp_name'], $basePath . $image);

        if($category !== false && $image_upload !== false)
        {
         $query = 'INSERT INTO royal.posts SET title = ?, cat_id = ?, body = ?, image = ?, created_at = NOW() ;';
        $statement = $pdo->prepare($query);
        $statement->execute([$_POST['title'], $_POST['cat_id'], $_POST['body'], $image]);
        }

        redirect('panel/post');

    }


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
                    <a class="bg-red-700 p-2 text-white rounded-md" href="<?= url('panel/pots') ?>">بازگشت</a>
                </div>
                <div class="w-full">
                    <form class="grid gap-4" action="<?= url('panel/post/create.php') ?>" method="post" enctype="multipart/form-data">
                        <div class="grid gap-2">
                            <label for="title">عنوان مطلب</label>
                            <input class="p-2 rounded-md ring-1" type="text" placeholder="عنوان دسته بندی را وارد کنید" id="title" name="title" />
                        </div>
                        <div class="grid gap-2">
                            <label for="body">توضیحات</label>
                            <textarea class="p-2" name="body" id="body" cols="30" rows="10"></textarea>
                        </div>
                        <div class="grid gap-2">
                            <label for="image">عکس</label>
                            <input type="file" name="image" id="image">
                        </div>
                        <div class="grid gap-2">
                            <label for="cat_id">انتخاب دسته بندی</label>
                            <select class="p-2" name="cat_id" id="cat_id">
                                <?php
                                global $pdo;
                                $query = "SELECT * FROM royal.categories";
                                $statement = $pdo->prepare($query);
                                $statement->execute();
                                $categories = $statement->fetchAll();
                                foreach ($categories as $category) { ?>
                                    <option value="<?= $category->id ?>"><?= $category->title ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <button type="submit" class="bg-green-700 p-2 text-white rounded-md w-40">ساخت پست</button>
                    </form>
                </div>
            </section>
        </main>
    </div>

    <script src="<?= asset('assets/js/script.js') ?>"></script>
</body>

</html>