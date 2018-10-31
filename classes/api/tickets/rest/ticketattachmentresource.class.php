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
     * @return Response
     * @throws Exception
     */
    public function get($ticketId) {
        $attachments = TicketAttachment::loadByTicketId($ticketId);
        if (empty($attachments)){
            throw new Exception("Failed to get attachment", Response::INTERNALSERVERERROR);
        } else {
            $attachment = $attachments[0];
        }

        $contents = file_get_contents($attachment->getAttachmentPath());
        return $this->generateCustomResponse('application/octet-stream', $contents, $attachment->fileName);
    }
}