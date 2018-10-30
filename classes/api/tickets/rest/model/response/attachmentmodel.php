<?php
/**
 * Created by PhpStorm.
 * User: joelsvensson
 * Date: 2018-10-30
 * Time: 21:28
 */

namespace Api\Tickets\Rest\Model\Response;


class AttachmentModel extends ResponseModel
{
    public $attachmentId;

    public $attachmentData;

    public static function createModel(\TicketAttachment $attachment) {
        $model = new self();
        $model->attachmentId = $attachment->ticketAttachmentId;
        $model->attachmentData = $attachment->getAttachmentBase64Encoded();
    }
}