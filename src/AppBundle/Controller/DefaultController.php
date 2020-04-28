<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     */
    public function hello(Request $request)
    {
        // replace this example code with whatever you need
        return new Response("Hello " . $request->get('name'));
    }

    /**
     * @Route("/hello");
     */
    public function byeAction(Request $request) {

        $helloTo = $request->get('to');

        return $this->render("demo.html.twig", ["param" => $helloTo]);

    }
}
