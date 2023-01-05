<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'filteradmin'    => \App\Filters\FilterAdmin::class,
        'filtersiswa'    => \App\Filters\FilterSiswa::class,
        'filterpanitia'    => \App\Filters\Filterpanitia::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [

            'filteradmin' => ['except' => [
                'auth', 'auth/*',
                'home', 'home/*',
                '/'
            ]],
            'filterpanitia' => ['except' => [
                'auth', 'auth/*',
                'home', 'home/*',
                '/'
            ]],
            'filtersiswa' => ['except' => [
                'auth', 'auth/*',
                'home', 'home/*',
                '/'
            ]]

        ],
        'after' => [
            'filteradmin' => ['except' => [
                'auth', 'auth/*',
                'admin', 'admin/*',
                'home', 'home/*',
                'datappdb', 'datappdb/*',
                'alurdaftar', 'alurdaftar/*',
                'settingfitur', 'settingfitur/*',
                'managebiodata', 'managebiodata/*',
                'tahunajaran', 'tahunajaran/*',
                '/'
            ]],
            'filterpanitia' => ['except' => [
                'auth', 'auth/*',
                'panitia', 'panitia/*',
                'home', 'home/*',
                '/'
            ]],
            'filtersiswa' => ['except' => [
                'auth', 'auth/*',
                'home', 'home/*',
                'siswa', 'siswa/*',
                '/'
            ]],
            'toolbar',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [];
}
