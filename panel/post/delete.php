<?php
require_once '../../functions/helpers.php';
require_once '../../functions/pdo_connection.php';
if (isset($_GET['post->id']) && $_GET['post->id'] == !'') {
    global $pdo;
    $query = 'DELETE FROM royal.posts WHERE id=?';
    $statement = $pdo->prepare($query);
    $statement->execute([$_GET['post->id']]);
    redirect('panel/post');
}
