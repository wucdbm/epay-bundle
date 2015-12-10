<?php

namespace Wucdbm\Bundle\EpayBundle\Controller;

use Wucdbm\Component\Epay\Exception\ChecksumMismatchException;
use Wucdbm\Component\Epay\Exception\NoDataException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Wucdbm\Bundle\WucdbmBundle\Controller\BaseController;

class EpayController extends BaseController {

    public function receiveAction(Request $request) {
        $api = $this->container->get('app.payments.epay');
        $post = $request->request->all();
        try {
            $payments = $api->receive($post);
            $response = $api->adaptReceiveResponse($payments);

            return new Response($response);
        } catch (NoDataException $ex) {
            // TODO: Handle through the API's subscriber

            return new Response('ERR=No Data');
        } catch (ChecksumMismatchException $ex) {
            // TODO: Handle through the API's subscriber

            return new Response('ERR=Not valid CHECKSUM');
        }
    }

}