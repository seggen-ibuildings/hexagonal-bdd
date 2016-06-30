<?php

namespace AppBundle\Controller;

use Application\StartGameCommand;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    /**
     * @Route("/start", name="start")
     * @Method("POST")
     */
    public function startAction()
    {
        $uuidFactory = $this->get('uuid.uuid_factory');
        $gameHandler = $this->get('app.start_game_handler');

        $command = new StartGameCommand();
        $command->gameId = $uuidFactory->uuid4();

        $gameHandler->handle($command);

        return $this->redirect($this->generateUrl('game', ['gameId' => $command->gameId]));
    }

    /**
     * @Route("/game/{gameId}", name="game")
     * @Method("GET")
     */
    public function gameAction($gameId)
    {
        return new Response('TODO');
    }
}
