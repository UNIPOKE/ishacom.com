<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitIncludePath
{
    public static $prefixesPsr0 = array (
        'M' => 
        array (
            'Main\\Foo' => 
            array (
                0 => __DIR__ . '/../..' . '/',
            ),
            'Main\\Bar' => 
            array (
                0 => __DIR__ . '/../..' . '/',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInitIncludePath::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
