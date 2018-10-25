<?php

namespace Api\Tickets\Rest\Model\Response;


abstract class ResponseModel
{
    protected static function getBaseUrl() {
        return CURRENT_HOST . 'tickets/rest';
    }
}