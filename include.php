<?php

#Config
include('../config/env.php');

#Data
foreach (glob('../data/*.php') as $file) {
    include($file);
}
#Model
foreach (glob('../data/model/*.php') as $file) {
    include($file);
}

#Control
foreach (glob('../control/*.php') as $file) {
    include($file);
}

?>