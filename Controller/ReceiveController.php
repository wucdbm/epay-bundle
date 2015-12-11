<?php

namespace Wucdbm\Bundle\EpayBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ReceiveController extends Controller {

    public function receiveAction(Request $request) {
        $client = $this->container->get('wucdbm_epay.client');
        $post = $request->request->all();
        $response = $client->receiveResponse($post);

        return new Response($response->toString());
    }

}