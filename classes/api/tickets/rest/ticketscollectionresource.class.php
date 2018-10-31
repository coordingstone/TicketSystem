<?php


namespace Api\Tickets\Rest;

use Api\Tickets\Rest\Model\Request\TicketAttachmentRequest;
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
        $ticketAttachmentRequest = $pObj->ticketAttachmentRequest;


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
        if ($ticketAttachmentRequest) {
            $this->setAttachment($ticket, $ticketAttachmentRequest);
            $attachment = \TicketAttachment::loadByTicketId($ticket->ticketId);
        }
        if (!empty($attachment)) {
            $model = Model\Response\TicketModel::createModel($ticket, $attachment[0]);
        } else {
            $model = Model\Response\TicketModel::createModel($ticket);
        }


        return $this->generateResponse($model);
    }

    /**
     * @param \Ticket $ticket
     * @param TicketAttachmentRequest $attachmentRequest
     * @throws TonicException
     */
    public function setAttachment($ticket, $attachmentRequest) {

        $rObj = $attachmentRequest;

        $attachmentAsBase64 = $rObj->attachment;
        $fileName = $rObj->fileName;
        $path_info = pathinfo($fileName);
        $fileName = $path_info['filename'];
        $extension = $path_info['extension'];


        try {
            \TicketAttachment::createAttachment($ticket->ticketId, $fileName, $extension, $attachmentAsBase64);
        } catch (\Exception $exception) {
            throw new Exception('Server error, could not create new attachment', Response::INTERNALSERVERERROR);
        }
    }
}