<?php

function url(){
    if(isset($_SERVER['HTTPS'])) {
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }
    else{
        $protocol='http';
    }
    return $protocol. "://" .$_SERVER['HTTP_HOST'].'/CodingChallenge/src/';
}

return[
    'base_url'=>url(),
    'db_config'=>[
         'hostname'=>'localhost',
         'username'=>'root',
         'password'=>'',
         'database'=>'code_challenge'
    ]
];


