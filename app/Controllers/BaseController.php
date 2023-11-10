<?php

declare(strict_types=1);

namespace News\Controllers;

use Twig\Environment;
use News\ApiServiss;


class BaseController
{
    protected Environment $twig;
    protected ApiServiss $apiService;

    public function __construct(Environment $twig, ApiServiss $apiService)
    {
        $this->twig = $twig;
        $this->apiService = $apiService;
    }
}