<?php 
namespace Alamin\UniqueSlugGenerator\Facades;

use Illuminate\Support\Facades\Facade;
class UniqueSlug extends Facade{

    protected static function getFacadeAccessor(): string
    {
        return 'unique-slug';
    }

}