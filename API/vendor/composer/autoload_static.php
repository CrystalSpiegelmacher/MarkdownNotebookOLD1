<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcb4cdba74638d66cab0007f4d2fea2a8
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'cebe\\markdown\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'cebe\\markdown\\' => 
        array (
            0 => __DIR__ . '/..' . '/cebe/markdown',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcb4cdba74638d66cab0007f4d2fea2a8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcb4cdba74638d66cab0007f4d2fea2a8::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}