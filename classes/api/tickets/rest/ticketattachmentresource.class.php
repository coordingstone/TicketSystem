<?php
/**
 * Created by PhpStorm.
 * User: joelsvensson
 * Date: 2018-10-28
 * Time: 19:06
 */

namespace Api\Tickets\Rest;

use Tonic\Exception;
use Tonic\Response;
use TicketAttachment;

/**
 * @uri /ticket/:ticketId/attachment
 * @SWG\Resource(
 *
 * )
 */
class TicketAttachmentResource extends BaseResource
{
    /**
     * @param $ticketId
     * @method GET
     */
    public function get($ticketId) {
        $attachments = TicketAttachment::loadByTicketId($ticketId);
        if (!empty($attachments)){
            $attachment = $attachments[0];
        }

        $contents = file_get_contents($attachment->getAttachmentPath());
        return $this->generateCustomResponse('application/octet-stream', $contents, $attachment->fileName);
    }

    /**
     * @param int $ticketId
     * @method PUT
     * @throws \Tonic\Exception
     * @return Response
     */
    public function setAttachment($ticketId) {

        $ticket = \Ticket::load($ticketId);
        $rObj = Model\Request\TicketAttachmentRequest::createInstance($this);

        $attachmentAsBase64 = $rObj->attachment;
        $fileName = $rObj->fileName;
        $path_info = pathinfo($fileName);
        $fileName = $path_info['filename'];
        $extension = $path_info['extension'];
        $ticketAttachments = TicketAttachment::loadByTicketId($ticketId);
        error_log(count($ticketAttachments));


        if (!empty($ticketAttachments)) {
            $oldAttachment = $ticketAttachments[0];
            try {
                $oldAttachment->updateAttachment($extension, $fileName, $attachmentAsBase64);
                return $this->generateEmptyResponse();
            } catch (\Exception $exception) {
                throw new Exception('Server error, could not delete old attachment', Response::INTERNALSERVERERROR);
            }
        }
        try {
            \TicketAttachment::createAttachment($ticket->ticketId, $fileName, 'txt', $attachmentAsBase64);
        } catch (\Exception $exception) {
            throw new Exception('Server error, could not create new attachment', Response::INTERNALSERVERERROR);
        }

        return $this->generateEmptyResponse();

    }
}