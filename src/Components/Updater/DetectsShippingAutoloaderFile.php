<?php

namespace Heptacom\Shopware\Util\Components\Updater;

trait DetectsShippingAutoloaderFile
{
    /**
     * @return string
     */
    public static function getShippedAutoloaderFile()
    {
        return implode(DIRECTORY_SEPARATOR, [
            __DIR__,
            '..',
            '..',
            '..',
            '..',
            '..',
            'autoload.php',
        ]);
    }

    /**
     * @return bool
     */
    public static function hasShippedAutoloaderFile()
    {
        return file_exists(self::getShippedAutoloaderFile());
    }
}
