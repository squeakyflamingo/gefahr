<?php
$state = (file_get_contents('store.txt') == "reset");

if(isset($_GET['team']) && $state === true) {
    file_put_contents('store.txt', 'team' . $_GET['team']);
}

if(isset($_GET['reset']) && $state === false) {
    file_put_contents('store.txt', 'reset');
}

?>