<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit28acb65d4f304fa9e7d7cb92d9d1c9f4
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit28acb65d4f304fa9e7d7cb92d9d1c9f4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit28acb65d4f304fa9e7d7cb92d9d1c9f4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit28acb65d4f304fa9e7d7cb92d9d1c9f4::$classMap;

        }, null, ClassLoader::class);
    }
}
