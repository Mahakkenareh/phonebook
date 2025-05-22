<?php
function sanitize($value){
    $level1 = trim($value);
    $level2 = strip_tags($level1);
    return $level2 ;
}

function hash_password($password,$hash_type){
    switch ($hash_type){
        case "md5": return md5($password);
        case "crc32": return crc32($password);
        case "sha1": return sha1($password);
    }

    return $password ;
}