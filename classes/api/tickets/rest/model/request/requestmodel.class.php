<?php

namespace Api\Tickets\Rest\Model\Request;


use Api\Tickets\Rest\BaseResource;

abstract class RequestModel
{

    private function __construct()
    {
    }


    /**
     * @param BaseResource $resource
     * @return static
     * @throws \Exception
     */
    public static function createInstance(BaseResource $resource) {
        return static::createInstanceWithData($resource->getRequestData());
    }

    /**
     * @param \stdClass $requestData
     * @return static
     * @throws \ReflectionException
     */
    public static function createInstanceWithData(\stdClass $requestData) {
        $calledClass = get_called_class();
        error_log($calledClass);
        $ref = new \ReflectionClass($calledClass);
        $properties = $ref->getProperties();
        $requestObj = new $calledClass();

        foreach ($properties as $property) {
            $propertyName = $property->getName();
            error_log($propertyName);

            if (isset($requestData->$propertyName)) {
                error_log("{$propertyName} is set");
                $data = $requestData->$propertyName;
                $type = static::getTypeAnnotation($property);
                if (!empty($type)) {
                    $requestObj->{$property->getName()} = static::getSanitizedAttribute($type, $data);
                } else {
                    $requestObj->{$property->getName()} = $requestData;
                }
            }
        }
        return $requestObj;
    }

    private static function getSanitizedAttribute($type, $data) {
        $typeLower = strtolower($type);
        switch ($typeLower) {
            case 'string':
                return filter_var($data);
                break;
            case 'integer':
                return intval($data);
                break;
            case 'double':
            case 'float':
                return floatval($data);
                break;
            case 'int[]':
                $array = array();
                if (is_array($data)) {
                    foreach ($data as $key => $val) {
                        $array[$key] = intval($val);
                    }
                }
                return $array;
            case 'array':
            case 'string':
            $array = array();
                if (is_array($data)) {
                    foreach ($data as $key => $val) {
                        $array[$key] = intval($val);
                    }
                }
                return $array;
            default:
                try {
                    return self::instantiateType($type, $data);
                } catch (\Exception $exception) {
                    error_log('Could not auto instantiate class');
                }
                break;
        }

        return false;
    }

    protected static function instantiateType($type, $data) {
        $isArray = substr($type, -2) === "[]";
        if ($isArray) {
            $arrType = substr($type, 0, strlen($type) - 2);
            $array = array();
            foreach ($data as $key => $val) {
                $array[$key] = self::instantiateType($arrType, $val);
            }
            return $array;
        } else {
            return self::instantiateSingleType($type, $data);
        }
    }

    protected static function instantiateSingleType($type, $data) {
        $class = __NAMESPACE__ . "\\" . $type;
        if (class_exists($class)) {
            return call_user_func(array("\\" . $class, 'createInstanceWithData'), $data);
        }
        return null;
    }

    private static function getTypeAnnotation(\ReflectionProperty $property) {
        if (preg_match('/@var\s+([^\s]+)/', $property->getDocComment(), $matches)) {
            list(, $type) = $matches;
            return $type;
        }
        return false;
    }

}