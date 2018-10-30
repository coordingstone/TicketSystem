<?php
namespace Api\Tickets\Rest;

use Tonic\Resource;
use Tonic\Response;

class BaseResource extends Resource {

    protected function setup() {
        parent::setup();
        $this->request->setData(json_decode($this->request->getData()));
    }

    public function getRequestData() {
        return $this->request->getData();
    }

    /**
     * @param array|object $result
     * @return Response
     */
    protected function generateResponse($result) {
        $response = new Response();
        $response->code = Response::OK;
        $response->contentType = "application/json; charset=utf-8";
        $response->body = json_encode($result);
        $response->contentMD5 = md5($response->body);

        return $response;
    }

    protected function generateEmptyResponse() {
        $response = new Response();
        $response->code = Response::NOCONTENT;
        return $response;
    }

    protected function generateCustomResponse($contentType, $body, $fileName) {
        $response = new Response();
        $response->code = Response::OK;
        $response->contentType = $contentType;
        $response->body = $body;
        $response->contentDisposition = 'attachment; filename=' . $fileName;
        $response->contentMD5 = md5($response->body);
        return $response;
    }


}