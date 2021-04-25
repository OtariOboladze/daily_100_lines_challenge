<?php

if(!$connection_bank = mysqli_connect('localhost', 'root', '', 'bank_2')){
    throw new Exception('something went wrong upon connecting to database');
}

mysqli_set_charset($connection_bank, 'utf8');