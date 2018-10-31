<?php
/**
 * Created by PhpStorm.
 * User: joelsvensson
 * Date: 2018-10-24
 * Time: 23:58
 */

namespace Api\Tickets\Rest;
use Api\Tickets\Rest\Model\Request\TicketAttachmentRequest;
use TicketAttachment;
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
     * @throws \Exception
     *
     * @method PUT
     * @provides application/json
     *
     */
    public function put($ticketId) {
        $ticket = \Ticket::load($ticketId);
        $pObj = Model\Request\TicketsRequest::createInstance($this);
        $ticketAttachmentRequest = $pObj->ticketAttachmentRequest;

        $ticket->openerName = $pObj->openerName;
        $ticket->issueDescription = $pObj->issueDescription;
        $ticket->closerName = $pObj->closerName;
        $ticket->status = $pObj->status;

        $db = \Db::getInstance();

        try {
            $db->startTransaction();

            if (!$ticket->update()) {
                throw new TonicException('Could not update ticket, Please try again', TonicResponse::INTERNALSERVERERROR);
            }

            $db->commitTransaction();
        } catch (\TonicException $exception) {
            try {
                $db->rollbackTransaction();
            } catch (\TonicException $e) {
                error_log('Could not update ticket');
            }

            throw $exception;
        }

        $ticket = \Ticket::load($ticketId);
        $this->setAttachment($ticket, $ticketAttachmentRequest);
        $attachment = \TicketAttachment::loadByTicketId($ticket->ticketId);

        if (!empty($attachment)) {
            $model = Model\Response\TicketModel::createModel($ticket, $attachment[0]);
            error_log("loaded attachment '$model->ticketAttachmentFileName'");
        } else {
            $model = Model\Response\TicketModel::createModel($ticket, null);
        }


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
        $ticketAttachment =TicketAttachment::loadByTicketId($ticketId);
        if ($ticket->delete()) {
            if (!empty($ticketAttachment)) {
                $ticketAttachment[0]->delete();
            }
            return $this->generateEmptyResponse();
        } else {
            throw new Exception('Server error', TonicResponse::INTERNALSERVERERROR);
        }


    }

    /**
     * @param \Ticket $ticket
     * @param TicketAttachmentRequest $ticketAttachmentRequest
     * @throws TonicException
     */
    public function setAttachment($ticket, $ticketAttachmentRequest) {

        $ticket = $ticket;
        $rObj = $ticketAttachmentRequest;

        $attachmentAsBase64 = $rObj->attachment;
        $fileName = $rObj->fileName;
        $path_info = pathinfo($fileName);
        $fileName = $path_info['filename'];
        $extension = $path_info['extension'];
        $ticketAttachments = TicketAttachment::loadByTicketId($ticket->ticketId);


        if (!empty($ticketAttachments)) {
            $oldAttachment = $ticketAttachments[0];
            try {
                $oldAttachment->updateAttachment($extension, $fileName, $attachmentAsBase64);
                return;
            } catch (\Exception $exception) {
                throw new Exception('Server error, could not delete old attachment', Response::INTERNALSERVERERROR);
            }
        }
        try {
            \TicketAttachment::createAttachment($ticket->ticketId, $fileName, 'txt', $attachmentAsBase64);
        } catch (\Exception $exception) {
            throw new Exception('Server error, could not create new attachment', Response::INTERNALSERVERERROR);
        }

    }
}