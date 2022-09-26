<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit08f5ff663ea8421a5197199151ca2cdb
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'Valitron\\' => 9,
        ),
        'L' => 
        array (
            'Laminas\\Stdlib\\' => 15,
            'Laminas\\Db\\' => 11,
        ),
        'J' => 
        array (
            'Johnny\\DeleteMe\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Valitron\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/valitron/src/Valitron',
        ),
        'Laminas\\Stdlib\\' => 
        array (
            0 => __DIR__ . '/..' . '/laminas/laminas-stdlib/src',
        ),
        'Laminas\\Db\\' => 
        array (
            0 => __DIR__ . '/..' . '/laminas/laminas-db/src',
        ),
        'Johnny\\DeleteMe\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'U' => 
        array (
            'Upload' => 
            array (
                0 => __DIR__ . '/..' . '/codeguy/upload/src',
            ),
        ),
        'P' => 
        array (
            'PHPExcel' => 
            array (
                0 => __DIR__ . '/..' . '/scoumbourdis/phpexcel/Classes',
            ),
        ),
        'G' => 
        array (
            'GroceryCrud' => 
            array (
                0 => __DIR__ . '/..' . '/grocerycrud/enterprise/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit08f5ff663ea8421a5197199151ca2cdb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit08f5ff663ea8421a5197199151ca2cdb::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit08f5ff663ea8421a5197199151ca2cdb::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit08f5ff663ea8421a5197199151ca2cdb::$classMap;

        }, null, ClassLoader::class);
    }
}