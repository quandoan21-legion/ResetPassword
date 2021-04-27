<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1f5b9704a6aecd60f49a3c7c565acd2f
{
    public static $prefixLengthsPsr4 = array (
        'U' => 
        array (
            'Users\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Users\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Src/Users',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1f5b9704a6aecd60f49a3c7c565acd2f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1f5b9704a6aecd60f49a3c7c565acd2f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1f5b9704a6aecd60f49a3c7c565acd2f::$classMap;

        }, null, ClassLoader::class);
    }
}
