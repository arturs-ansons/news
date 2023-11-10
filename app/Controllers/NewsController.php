<?php

namespace News\Controllers;

class NewsController extends BaseController
{
    /**
     * @throws \Twig\Error\SyntaxError
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\LoaderError
     */
    public function index(): void //Response
    {
        $selectedCountry = $_POST['country'] ?? null;

        if ($selectedCountry !== null) {
            $news = $this->apiService->fetchNewsByCountry($selectedCountry);
        } else {
            $news = null;
        }

        $this->twig->addGlobal('news', $news);

        echo $this->twig->render('index.twig');
    }
    /**
     * @throws \Twig\Error\SyntaxError
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\LoaderError
     */
    public function showNews(): void
    {
        $query = $_POST['query'] ?? null;
        $fromDate = $_POST['fromDate'] ?? null;
        $toDate = $_POST['toDate'] ?? null;

                $news = $this->apiService->fetchNewsByDateAndPost($query, $fromDate, $toDate);


            $this->twig->addGlobal('news', $news);


        echo $this->twig->render('index.twig');
    }


}