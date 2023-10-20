<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit06a246fb7fd541d754d977d9b5f184ae
{
    public static $files = array (
        '6e3fae29631ef280660b3cdad06f25a8' => __DIR__ . '/..' . '/symfony/deprecation-contracts/function.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Container\\' => 14,
        ),
        'F' => 
        array (
            'Faker\\Provider\\' => 15,
            'Faker\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'Faker\\Provider\\' => 
        array (
            0 => __DIR__ . '/..' . '/pelmered/fake-car/src',
        ),
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fakerphp/faker/src/Faker',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit06a246fb7fd541d754d977d9b5f184ae::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit06a246fb7fd541d754d977d9b5f184ae::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit06a246fb7fd541d754d977d9b5f184ae::$classMap;

        }, null, ClassLoader::class);
    }
}
