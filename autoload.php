<?php

function load($classe){
    $paths = array(
        '',
        'classes/',
        'Model/',
        '../classes/',
        '../Model/',
        'traitement/',
        '../traitement/',



    );
    foreach ($paths as $path) {
        $finalPath = $path.$classe.'.php';
        if (file_exists($finalPath)){
            require $finalPath;
            break;
        }
    }
}
spl_autoload_register('load');