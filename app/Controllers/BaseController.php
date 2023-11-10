<?php
namespace News\Controllers;

use Twig\Environment;
use News\Models\ApiServiss;


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