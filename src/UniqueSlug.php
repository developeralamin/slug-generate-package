<?php

namespace Alamin\UniqueSlugGenerator;

class UniqueSlug
{
    public static function generate($title, $separator = '-', $dictionary = ['@' => 'at'], $existingSlugs = [])
    {

        // Convert all dashes/underscores into separator
        $flip = $separator === '-' ? '_' : '-';
        $title = preg_replace('!['.preg_quote($flip).']+!u', $separator, $title);

        // Replace dictionary words
        foreach ($dictionary as $key => $value) {
            $dictionary[$key] = $separator . $value . $separator;
        }
        $title = str_replace(array_keys($dictionary), array_values($dictionary), $title);

        $title = implode('', (array) str_replace(array_keys($dictionary), array_values($dictionary), $title));

        // Remove special characters
        $title = preg_replace('![^'.preg_quote($separator).'\pL\pN\s]+!u', '', static::lower($title));

        // Replace spaces and duplicate separators
        $title = preg_replace('!['.preg_quote($separator).'\s]+!u', $separator, $title);
        
        // Trim separators from start and end
        $slug = trim($title, $separator);

        // Ensure uniqueness
        $originalSlug = $slug;
        $counter = 1;
        while (in_array($slug, $existingSlugs)) {
            $slug = $originalSlug . $separator . $counter;
            $counter++;
        }

        return $slug;
    }

 

    protected static function lower($str)
    {
        return mb_strtolower($str);
    }
}
