<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInite0c2ca9fa0e2477f3572b4387e9ad5fb
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

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInite0c2ca9fa0e2477f3572b4387e9ad5fb', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInite0c2ca9fa0e2477f3572b4387e9ad5fb', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        \Composer\Autoload\ComposerStaticInite0c2ca9fa0e2477f3572b4387e9ad5fb::getInitializer($loader)();

        $loader->register(true);

        $includeFiles = \Composer\Autoload\ComposerStaticInite0c2ca9fa0e2477f3572b4387e9ad5fb::$files;
        foreach ($includeFiles as $fileIdentifier => $file) {
            composerRequiree0c2ca9fa0e2477f3572b4387e9ad5fb($fileIdentifier, $file);
        }

        return $loader;
    }
}

/**
 * @param string $fileIdentifier
 * @param string $file
 * @return void
 */
function composerRequiree0c2ca9fa0e2477f3572b4387e9ad5fb($fileIdentifier, $file)
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;

        require $file;
    }
}
