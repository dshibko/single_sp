<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'Score Predictor Admin',

    // preloading 'log' component
    'preload'=>array('log'),

    // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'application.models.Entities.*',
        'application.models.Forms.*',
        'application.components.*',
        'application.controllers.*',
    ),

    'modules'=>array(
        // uncomment the following to enable the Gii tool

        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'truefan',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'=>array('127.0.0.1','::1'),
        ),

    ),

    // application components
    'components'=>array(
        'image' => array(
            'class' => 'application.extensions.image.CImageComponent',
            // GD or ImageMagick
            'driver' => 'GD',
            // ImageMagick setup path
            'params' => array('directory' => '/opt/local/bin'),
        ),
        'user'=>array(
            // enable cookie-based authentication
            'allowAutoLogin'=>false,
        ),
        // uncomment the following to enable URLs in path-format

        'urlManager'=>array(
            'urlFormat'=>'path',
            'showScriptName'=>false,
            'rules'=>array(
                '<action:\w+>' => 'site/<action>',
                '<action:\w+>/<do:(add)>' => 'site/<action>',
                '<action:\w+>/<do:(edit|view|delete)>/<id:\d+>' => 'site/<action>',
            ),
        ),
/*
        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=scorepredictor',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '123',
            'charset' => 'utf8',
        ),*/
        'db'=>array(
            'connectionString' => 'mysql:host=10.14.43.7;dbname=scorepredictor',
            'emulatePrepare' => true,
            'username' => 'spadmin',
            'password' => 'd&%7PC6/g938j=4TKeW=',
            'charset' => 'utf8',
        ),

        'errorHandler'=>array(
            // use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning',
                ),
                // uncomment the following to show log messages on web forms
                /*
                array(
                    'class'=>'CWebLogRoute',
                ),
                */
            ),
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>array(
        // this is used in contact page
        'sp_source_path' => '/home/dmitryshibko/public_html/sp.hiqo-solutions.loc/',
        'adminEmail'=>'d.shibko@gmail.com',
    ),
);