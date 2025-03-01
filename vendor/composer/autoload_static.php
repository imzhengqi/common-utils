<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite040c1c34f50c0a79665b569745b340d
{
    public static $prefixLengthsPsr4 = array (
        'Z' => 
        array (
            'Zhengqi\\CommonUtils\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Zhengqi\\CommonUtils\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite040c1c34f50c0a79665b569745b340d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite040c1c34f50c0a79665b569745b340d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite040c1c34f50c0a79665b569745b340d::$classMap;

        }, null, ClassLoader::class);
    }
}
