<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
    #[Route(
        '/lucky/{max}',
        name: 'lucky_number',
        condition: "params[max] < 1000"
    )]

    public function number(Request $request): Response
    {
        $routeParameters = $request->attributes->get('_route_params');

        if (! isset($routeParameters)) {
            $routeParameters = 100;
        }
        $number = random_int(0, 100);

        return $this->render('lucky/index.html.twig',[
            'number' => $number,
            'routeParameters' => $routeParameters,
        ]);
    }
}