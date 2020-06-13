<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Service\GraphGenerator;

class GraphController extends Controller
{
    private $graphGenerator;

    public function __construct(GraphGenerator $graphGenerator)
    {
        $this->graphGenerator = $graphGenerator;
    }

    /**
     * @Security("has_role('ROLE_USER')")
     * @Route("/jpgraph", name="graphics")
     * @Method("POST")
     * @throws \Exception
     *
     */
    public function makeGraph(Request $request) //перенаправление логики в service
    {
        $json = json_decode($request->getContent(), true);
        $image = $this->graphGenerator->generate($json['type'], $json['data'], $json['labels']);
        return new Response($image);
    }
}
