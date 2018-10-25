<?php


namespace Api\Tickets\Rest;

use Tonic\Exception;
use Tonic\Response as TonicResponse;
use Tonic\Exception as TonicException;


/**
 * @uri /tickets
 */
class TicketsCollectionResource extends BaseResource
{
    /**
     * @return \Tonic\Response
     * @throws TonicException
     * @method GET
     * @provides application/json
     */
    public function get() {



        $tickets = array();
        $ticket = new \Ticket();
        $ticket->ticketId = 1;
        $ticket->issuer = 'Joel Svensson';
        $ticket->closer = 'Malin Lind';

        $ticket1 = new \Ticket();
        $ticket1->ticketId = 2;
        $ticket1->issuer = 'ML';
        $ticket1->closer = 'JS';

        array_push($tickets, $ticket);
        array_push($tickets, $ticket1);
        error_log(count($tickets));

        $models = array();
        foreach ($tickets as $ticket) {
            $models[] = Model\Response\TicketModel::createModel($ticket);
            error_log($ticket->issuer);
        }

        return $this->generateResponse($models);
    }

    /**
     * @return TonicResponse
     * @throws \Tonic\Exception
     * @method POST
     * @provides application/json
     */
    public function post() {
        return $this->generateEmptyResponse();
    }
}