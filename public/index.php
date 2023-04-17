<?php

namespace Caio\Pagination;

require "../vendor/autoload.php";

$currentPage  = $_GET['page'] ?? 1; // Get the current page from the query string
$totalItems   = count(User::getUsers()); // Get the total number of users
$itemsPerPage = 10; // Set the number of users to display per page

$pagination = new Pagination($currentPage, $totalItems, $itemsPerPage); // Create a new Pagination object

$users = User::getUsers($pagination); // Get the users for the current page

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assets/css/style.css">

    <title>Document</title>
</head>

<body>
    <?php
    foreach ($users as $user) {
        echo $user->first_name . ' ' . $user->last_name . '<br>';
    }

    ?>

    <nav>
        <ul>
            <?php if ($pagination->hasPrevPage()): ?>
                <li><a href="?page=<?php echo $pagination->currentPage - 1 ?>">Previous</a></li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $pagination->getTotalPages(); $i++): ?>
                <li><a href="?page=<?php echo $i ?>"><?php echo $i ?></a></li>
            <?php endfor; ?>

            <?php if ($pagination->hasNextPage()): ?>
                <li><a href="?page=<?php echo $pagination->currentPage + 1 ?>">Next</a></li>
            <?php endif; ?>
        </ul>
    </nav>

</body>

</html>