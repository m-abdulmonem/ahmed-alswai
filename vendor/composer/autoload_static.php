<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit28adee2cf35d1a8df3763a86937afe20
{
    public static $files = array (
        'ad155f8f1cf0d418fe49e248db8c661b' => __DIR__ . '/..' . '/react/promise/src/functions_include.php',
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        'c65d09b6820da036953a371c8c73a9b1' => __DIR__ . '/..' . '/facebook/graph-sdk/src/Facebook/polyfills.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Component\\Routing\\' => 26,
            'Symfony\\Component\\HttpFoundation\\' => 33,
            'Symfony\\Component\\EventDispatcher\\' => 34,
        ),
        'R' => 
        array (
            'React\\Stream\\' => 13,
            'React\\Socket\\' => 13,
            'React\\Promise\\' => 14,
            'React\\EventLoop\\' => 16,
            'Ratchet\\' => 8,
        ),
        'F' => 
        array (
            'Facebook\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Component\\Routing\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/routing',
        ),
        'Symfony\\Component\\HttpFoundation\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/http-foundation',
        ),
        'Symfony\\Component\\EventDispatcher\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/event-dispatcher',
        ),
        'React\\Stream\\' => 
        array (
            0 => __DIR__ . '/..' . '/react/stream/src',
        ),
        'React\\Socket\\' => 
        array (
            0 => __DIR__ . '/..' . '/react/socket/src',
        ),
        'React\\Promise\\' => 
        array (
            0 => __DIR__ . '/..' . '/react/promise/src',
        ),
        'React\\EventLoop\\' => 
        array (
            0 => __DIR__ . '/..' . '/react/event-loop/src',
        ),
        'Ratchet\\' => 
        array (
            0 => __DIR__ . '/..' . '/cboden/ratchet/src/Ratchet',
        ),
        'Facebook\\' => 
        array (
            0 => __DIR__ . '/..' . '/facebook/graph-sdk/src/Facebook',
        ),
    );

    public static $prefixesPsr0 = array (
        'G' => 
        array (
            'Guzzle\\Stream' => 
            array (
                0 => __DIR__ . '/..' . '/guzzle/stream',
            ),
            'Guzzle\\Parser' => 
            array (
                0 => __DIR__ . '/..' . '/guzzle/parser',
            ),
            'Guzzle\\Http' => 
            array (
                0 => __DIR__ . '/..' . '/guzzle/http',
            ),
            'Guzzle\\Common' => 
            array (
                0 => __DIR__ . '/..' . '/guzzle/common',
            ),
        ),
        'E' => 
        array (
            'Evenement' => 
            array (
                0 => __DIR__ . '/..' . '/evenement/evenement/src',
            ),
        ),
    );

    public static $classMap = array (
        'EasyPeasyICS' => __DIR__ . '/..' . '/phpmailer/phpmailer/extras/EasyPeasyICS.php',
        'PHPMailer' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmailer.php',
        'PHPMailerOAuth' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmaileroauth.php',
        'PHPMailerOAuthGoogle' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmaileroauthgoogle.php',
        'POP3' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.pop3.php',
        'SMTP' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.smtp.php',
        'ntlm_sasl_client_class' => __DIR__ . '/..' . '/phpmailer/phpmailer/extras/ntlm_sasl_client.php',
        'phpmailerException' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmailer.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit28adee2cf35d1a8df3763a86937afe20::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit28adee2cf35d1a8df3763a86937afe20::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit28adee2cf35d1a8df3763a86937afe20::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit28adee2cf35d1a8df3763a86937afe20::$classMap;

        }, null, ClassLoader::class);
    }
}