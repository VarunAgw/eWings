<?php

if (empty($_GET['q'])) {
    return;
} else {
    $q = $_GET['q'];
}

$booksTable = new BooksTable();
$books = $booksTable->search($q);

return [
    'json' => ['books' => $books],
];
