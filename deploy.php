<?php

  $LOCAL_REPO = "/var/www/vhosts/12southdev.com/michelemclaughlinmusic.12southdev.com/wp-content/themes/michele/";

  echo shell_exec("cd $LOCAL_REPO");
  echo shell_exec("git pull origin master");
?>

