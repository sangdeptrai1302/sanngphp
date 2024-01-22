<?php

namespace App\Helper;

use Cake\Utility\Text;

class SlugHelper
{
    public static function createSlug($text)
    {
        return Text::slug($text);
    }
}
