<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class DefaultController
{
    /**
     * @var HttpClientInterface $httpClient
     */
    private HttpClientInterface $httpClient;

    /**
     * @param HttpClientInterface $httpClient
     */
    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @Route("/", name="index")
     */
    public function index(Environment $twig): Response
    {
        try {
            $response = $this->httpClient->request('GET', $_ENV['API_RESULT_FDJ']);
            $items = $response->toArray();
        } catch  (\Throwable $e) {
            return new Response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return new Response($twig->render('index.html.twig',['items' =>$items[0]]));
    }
}
