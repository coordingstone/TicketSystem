<?php

abstract class DbObject
{
    abstract function loadData(&$res);

    public static function loadById($query, $id) {
        $db = Db::getInstance();
        $stmt = $db->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $row = $stmt->fetchRow();
        $stmt->close();
        if ($row) {
            $class = get_called_class();
            $obj = new $class();
            $obj->loadData($row);
            return $obj;
        }

        return false;
    }

    public static function insertByParams($query, $typeString = '', $values = array(), $returnId = true) {
        $db = Db::getInstance();
        $stmt = $db->prepare($query);
        error_log($query);
        if ($typeString != '') {
            array_unshift($values, $typeString);
            $callParams = array();
            foreach ($values as $key => $val) {
                $callParams[] = &$values[$key];
            }
            $ref = new ReflectionClass('mysqli_stmt');
            $method = $ref->getMethod('bind_param');
            $method->invokeArgs($stmt, $callParams);
        }
        $result = $stmt->execute();
        if ($result) {
            if (!$returnId) {
                $id = $result;
            } else {
                $id = $stmt->insert_id;
            }
        }
        $stmt->close();
        return $id;

    }

    public static function queryByParams($query, $typeString = '', $values = array()) {
        $db = Db::getInstance();
        $stmt = $db->prepare($query);

        if ($typeString != '') {
            array_unshift($values, $typeString);
            $callParams = array();
            foreach ($values as $key => $val) {
                $callParams[] = &$values[$key];
            }
            $ref = new ReflectionClass('mysqli_stmt');
            $method = $ref->getMethod('bind_param');
            $method->invokeArgs($stmt, $callParams);
        }
        $result = $stmt->execute();
        $stmt->close();
        if ($result) {
           return true;
        }

        return false;

    }

    public static function loadAllByParams($query, $typeString = '', $values = array()) {
        $db = Db::getInstance();

        $stmt = $db->prepare($query);


        if ($typeString != '') {
            array_unshift($values, $typeString);
            $callParams = array();
            foreach ($values as $key => $val) {
                $callParams[] = &$values[$key];
            }
            $ref = new ReflectionClass('mysqli_stmt');
            $method = $ref->getMethod('bind_param');
            $method->invokeArgs($stmt, $callParams);
        }

        $stmt->execute();

        $objs = array();
        $rows = $stmt->fetchRows();
        $stmt->close();
        foreach ($rows as $row) {
            $class = get_called_class();
            $obj = new $class();
            $obj->loadData($row);
            $objs[] = $obj;
        }

        return $objs;
    }
}