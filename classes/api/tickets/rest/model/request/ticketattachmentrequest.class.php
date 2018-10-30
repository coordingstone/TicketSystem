<?php
/**
 * Created by PhpStorm.
 * User: joelsvensson
 * Date: 2018-10-28
 * Time: 19:09
 */

namespace Api\Tickets\Rest\Model\Request;


class TicketAttachmentRequest extends RequestModel
{
    /**
     * @var string
     */
    public $attachment;
    /**
     * @var string
     */
    public $fileName;
}