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

        $tickets = \Ticket::listAllTickets();

        $models = array();
        foreach ($tickets as $ticket) {
            $attachments = \TicketAttachment::loadByTicketId($ticket->ticketId);
            if (!empty($attachments)) {
                $attachment = $attachments[0];
            }
            if ($attachment) {
                $models[] = Model\Response\TicketModel::createModel($ticket, $attachment);
                $attachment = null;
            } else {
                $models[] = Model\Response\TicketModel::createModel($ticket);
            }

        }

        return $this->generateResponse($models);
    }

    /**
     * @return TonicResponse
     * @throws \Exception
     * @method POST
     * @provides application/json
     */
    public function post() {

        $ticket = new \Ticket();

        $pObj = Model\Request\TicketsRequest::createInstance($this);

        $ticket->openerName = $pObj->openerName;
        $ticket->issueDescription = $pObj->issueDescription;
        $ticket->closerName = $pObj->closerName;
        $ticket->status = $pObj->status;

        $db = \Db::getInstance();


        try {
            $db->startTransaction();

            $ticket->ticketId = $ticket->insert();

            if (!$ticket->ticketId) {
                throw new TonicException('Could not create ticket', TonicResponse::INTERNALSERVERERROR);
            }
            $db->commitTransaction();
        } catch (\Exception $exception) {
            try {
                $db->rollbackTransaction();
            } catch (\Exception $e) {
                error_log('Could not rollback transaction');
            }
            throw $exception;
        }

        $ticket = \Ticket::load($ticket->ticketId);
        $model = Model\Response\TicketModel::createModel($ticket);

        return $this->generateResponse($model);
    }
}