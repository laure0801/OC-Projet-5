<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit70767b68e7f6b13e3519682db743b215
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit70767b68e7f6b13e3519682db743b215', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit70767b68e7f6b13e3519682db743b215', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit70767b68e7f6b13e3519682db743b215::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
