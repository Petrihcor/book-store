<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd396a1dc2bfea8f091454cc38290e24d
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Src\\' => 4,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Src\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Core',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd396a1dc2bfea8f091454cc38290e24d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd396a1dc2bfea8f091454cc38290e24d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd396a1dc2bfea8f091454cc38290e24d::$classMap;

        }, null, ClassLoader::class);
    }
}
