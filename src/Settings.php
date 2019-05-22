<?php

/*
 * This file is part of RB28DETT.
 *
 * (c) Erik Campobadal <soc@erik.cat>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RB28DETT\Settings;

use Illuminate\Support\Facades\Facade;

/**
 * This is the settings facade class.
 *
 * @author Erik Campobadal <soc@erik.cat>
 */
class Settings extends Facade
{
    /**
     * Returns the package settings if they exists.
     *
     * @param string $package
     */
    public static function get($package)
    {
        $dir = __DIR__.'/../../'.$package.'/src';
        $files = is_dir($dir) ? scandir($dir) : [];

        foreach ($files as $file) {
            if ($file == 'Settings.json') {
                $file_r = file_get_contents($dir.'/'.$file);

                return json_decode($file_r, true);
            }
        }

        return [];
    }

    /**
     * Returns the settings view of the package.
     *
     * @param string $package
     */
    public static function view($package)
    {
        $settings = static::get($package);

        if ($settings and array_key_exists('view', $settings)) {
            return view($settings['view']);
        }

        return '';
    }
}
