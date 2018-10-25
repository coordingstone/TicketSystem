<?php
/**
 * Created by PhpStorm.
 * User: joelsvensson
 * Date: 2018-10-24
 * Time: 23:58
 */

namespace Api\Tickets\Rest;
use Tonic\Response as TonicResponse;
use Tonic\Exception as TonicException;
use Tonic\Response;

/**
 * @uri /tickets/:ticketId
 */
class TicketResource extends BaseResource
{
    /**
     * @param $ticketId
     * @return \Tonic\Response
     * @throws \Tonic\Exception
     *
     * @method PUT
     * @provides application/json
     *
     */
    public function put($ticketId) {
        return $this->generateEmptyResponse();
    }

    /**
     * @param $ticketId
     * @return \Tonic\Response
     * @throws \Tonic\Exception
     * @method DELETE
     */
    public function delete($ticketId) {
        return $this->generateEmptyResponse();
    }
}