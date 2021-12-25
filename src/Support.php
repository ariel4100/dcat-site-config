<?php


namespace Dcat\Admin;

class Support
{
    public static function trans($string)
    {
        return SiteConfigServiceProvider::trans($string);
    }

}
