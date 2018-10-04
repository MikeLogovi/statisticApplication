<?php
session_destroy();
setcookie('id',NULL, -1);
setcookie('username',NULL, -1);
setcookie('motpass',NULL, -1);

header('Location:connexion');
