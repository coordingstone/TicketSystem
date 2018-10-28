<?php
/**
 * Created by PhpStorm.
 * User: joelsvensson
 * Date: 2018-10-24
 * Time: 23:58
 */

namespace Api\Tickets\Rest;
use Tonic\Exception;
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
        $ticket = \Ticket::load($ticketId);
        $pObj = Model\Request\TicketsRequest::createInstance($this);

        $ticket->openerName = $pObj->openerName;
        error_log($ticket->openerName);
        error_log($pObj->openerName);
        $ticket->issueDescription = $pObj->issueDescription;
        $ticket->closerName = $pObj->closerName;
        $ticket->status = $pObj->status;

        $db = \Db::getInstance();

        try {
            $db->startTransaction();

            if (!$ticket->update()) {
                throw new Exception('Could not update ticket, Please try again', TonicResponse::INTERNALSERVERERROR);
            }

            $db->commitTransaction();
        } catch (\Exception $exception) {
            try {
                $db->rollbackTransaction();
            } catch (\Exception $e) {
                error_log('Could not update ticket');
            }

            throw $exception;
        }

        $ticket = \Ticket::load($ticketId);
        $model = Model\Response\TicketModel::createModel($ticket);
        return $this->generateResponse($model);
    }

    /**
     * @param $ticketId
     * @return \Tonic\Response
     * @throws \Tonic\Exception
     * @method DELETE
     */
    public function delete($ticketId) {
        $ticket = \Ticket::load($ticketId);
        if ($ticket->delete()) {
            return $this->generateEmptyResponse();
        } else {
            throw new Exception('Server error', TonicResponse::INTERNALSERVERERROR);
        }


    }
}