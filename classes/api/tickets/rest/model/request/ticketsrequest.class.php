<?php

namespace Api\Tickets\Rest\Model\Request;


class TicketsRequest extends RequestModel
{

    /**
     * @var int
     */
    public $ticketId;

    /**
     * @var string
     */
    public $openerName;

    /**
     * @var string
     */
    public $issueDescription;

    /**
     * @var string
     */
    public $closerName;

    /**
     * @var string ENUM(OPEN, CLOSED)
     */
    public $status;

}