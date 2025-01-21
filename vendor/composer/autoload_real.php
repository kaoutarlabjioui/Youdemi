<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitbf70f511b5e75fc3fd25f211c166049a
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

        spl_autoload_register(array('ComposerAutoloaderInitbf70f511b5e75fc3fd25f211c166049a', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitbf70f511b5e75fc3fd25f211c166049a', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitbf70f511b5e75fc3fd25f211c166049a::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
