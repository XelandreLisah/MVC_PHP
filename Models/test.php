<?php

include_once 'Users.php';

$test = new Users();
echo"<pre>";
//$get = $test->create_user('arnaud','azerty','aldo@aldo.com');
//$get=$test->get_task(2);
//var_dump($get);
$get=$test->edit_user(1,'alex');
$get=$test->delete_user(2);

echo"</pre>";