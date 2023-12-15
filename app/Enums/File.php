<?php

declare(strict_types=1);

namespace App\Enums;

enum File 
{
    case IMAGE;

    case AUDIO;

    case ARCHIVE;

    case VIDEO;

    case DOCUMENT;


    public function get()
    {
        return match($this)
        {
            self::IMAGE => 'image',
            self::AUDIO => 'audio',
            self::ARCHIVE => 'archive',
            self::DOCUMENT => 'document',
            self::VIDEO => 'video'
        };
    }
}