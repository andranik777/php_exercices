<?php
    spl_autoload_register(function ($class_name) {
        $folders = [
            'Controller/',
            'Model/',
            'Model/Manager/',
        ];

        foreach ($folders as $folder){
            if(file_exists($folder.$class_name.'.php')){
                require $folder.$class_name.'.php';
                break;
            }
        }
    });
?>