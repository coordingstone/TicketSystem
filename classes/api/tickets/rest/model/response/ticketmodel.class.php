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
    public $createtime;

    /**
     * @param \Ticket $pObj
     * @return TicketModel
     */
    public static function createModel($pObj) {
        $model = new self();
        $model->ticketId = $pObj->ticketId;
        $model->openerName = $pObj->openerName;
        $model->issueDescription = $pObj->issueDescription;
        $model->closerName = $pObj->closerName;
        $model->status = $pObj->status;
        $model->createtime = $pObj->createtime;
        return $model;
    }

}