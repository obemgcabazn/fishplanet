<?php
$username = htmlspecialchars($_POST['name']);
$phone = htmlspecialchars($_POST['phone']);
$comment = htmlspecialchars($_POST['comment']);


if ( $phone ) {

  $to = 'office@spaceweb.studio';
  $from='call-back@fishplanet.loc';

  mail($to, $username, $message, 'From:'.$from);

  echo "Спасибо за заявку!";

}