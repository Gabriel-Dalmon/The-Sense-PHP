<?php
unset($_SESSION['user']);

header('Location:'.$url->original);