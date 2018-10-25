<?php

namespace Api\Tickets\Rest\Model\Response;

class TicketModel extends ResponseModel
{
    /**
     * @var int
     */
    public $ticketId;
    public $issuer;
    public $closer;
    public $createtime;
    public $deletetime;

    /**
     * @param $pObj
     * @return TicketModel
     */
    public static function createModel($pObj) {
        $model = new self();
        $model->ticketId = $pObj->ticketId;
        $model->issuer = $pObj->issuer;
        $model->closer = $pObj->closer;
        $model->createtime = date('today');
        $model->deletetime = date('-30 Days');
        return $model;
    }

}