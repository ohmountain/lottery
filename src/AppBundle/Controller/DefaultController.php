<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use RandBuilder\Builder;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle:Default:index.html.twig');
    }

    public function randAction()
    {
        $schema = [
            'object' => [
                'open_id' => [
                    'type' => 'string',
                    'length' => 20,
                    'unique' => true
                ],
                'name'  => [
                    'type' => 'string',
                    'length' => 6
                ],
                'headimgurl' => [
                    'type' => 'string',
                    'length' => 20,
                    'end' => '.jpg',
                    'reducer' => function ($headimgurl) {
                        return "default.png";
                    }
                ]
            ],
            'count' => 20
        ];

        $objects = Builder::build($schema);

        $response = new \Symfony\Component\HttpFoundation\JsonResponse;
        $response->setContent(json_encode($objects));

        return $response;
    }

    public function randMoreAction()
    {
    }
}
