<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2028be39a2b766f308c88bc4c6893b5a
{
    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Phpml' => 
            array (
                0 => __DIR__ . '/..' . '/php-ai/php-ml/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit2028be39a2b766f308c88bc4c6893b5a::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
