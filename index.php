<?php
$config =(include './src/Config.php');
header("Location: ".$config['base_url'].'/src/html/module/Comments/view/comments.php');
exit();
