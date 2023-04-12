<?php

namespace Caio\Pagination;

require "../vendor/autoload.php";

$total = 12;
$per_page = 5;
$cur_page = 1;

$pagination = new Pagination($cur_page, $total, $per_page);
$offset = $pagination->offset();
$query = "SELECT username, date FROM users ORDER BY id ASC LIMIT {$offset}, {$per_page}";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>