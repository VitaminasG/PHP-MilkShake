<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9aa6db3d7b462e4486b728a301cd13d9
{
    public static $files = array (
        '4213e27cc9e2ec5936c77d768d2293e0' => __DIR__ . '/../..' . '/src/helpers/mainHelper.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9aa6db3d7b462e4486b728a301cd13d9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9aa6db3d7b462e4486b728a301cd13d9::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
