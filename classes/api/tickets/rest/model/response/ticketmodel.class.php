<?php

namespace Api\Tickets\Rest\Model\Response;

class TicketModel extends ResponseModel
{
    /**
     * @var int
     */
    public $ticketId;
    public $openerName;
    public $issueDescription;
    public $closerName;
    public $status;
    public $ticketAttachmentUrl;
    public $ticketAttachmentFileName;
    public $createtime;

    /**
     * @param \Ticket $pObj
     * @param \TicketAttachment $attachment
     * @return TicketModel
     */
    public static function createModel($pObj, $attachment = null) {
        $model = new self();
        $model->ticketId = $pObj->ticketId;
        $model->openerName = $pObj->openerName;
        $model->issueDescription = $pObj->issueDescription;
        $model->closerName = $pObj->closerName;
        if ($attachment) {
            $model->ticketAttachmentUrl = "/tickets/rest/ticket/" . $model->ticketId . "/attachment";
            $model->ticketAttachmentFileName = $attachment->fileName;
        }
        $model->status = $pObj->status;
        $model->createtime = $pObj->createtime;
        return $model;
    }

}