<?php

namespace Api\Tickets\Rest\Model\Request;


class TicketsRequest
{

    /**
     * @var int
     */
    public $ticketId;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $closer;

    /**
     * @var string
     */
    public $createtime;

    /**
     * @var string
     */
    public $closetime;

}