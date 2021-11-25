<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{

    public function index(): Response
    {
        return new Response('Ma première réponse');
    }

    public function exo1(string $name): Response
    {
        return new Response('<p>Bonjour '.$name.'!</p>');
    }

    public function httpMessage(Request $request): Response
    {
        $uri = $request->getUri();

        $time = $request->server->get('REQUEST_TIME').

        $formData = $request->request->get('my-form-data');

        $param = $request->query->get('lang','fr');

        // Ne pas utiliser d'écriture directe sur la sortie standard
        // ou sur tout ce qui est lié à la réponse
        // passer par l'objet Response

        // echo '<h1>Un titre</h1>';
        // print_r, var_dump, header, http_response_code, ...

        $response = new Response(
            '<h1>Un Titre</h1>'.
            '<p>URI: ' .$uri.'</p>'.
            '<p>lang: ' .$param.'</p>',
            Response::HTTP_ACCEPTED, [
                'content-type' => 'text/html; charset=UTF-8',
                'my-blog-info' => 'new article',
                ]
        );

        $response->headers->set('expires', (new \DateTimeImmutable('tomorrow'))->format('c'));

        return $response;
    }
}
