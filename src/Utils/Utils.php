<?php

namespace App\Utils;

use WhiteOctober\BreadcrumbsBundle\Model\Breadcrumbs;

class Utils
{
    public $breadcrumbs;
    
    public function __construct(Breadcrumbs $breadcrumbs)
    {
        $this->breadcrumbs = $breadcrumbs;
    }
}
