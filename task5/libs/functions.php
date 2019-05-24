<?php

function saveData(iWorkData $object, $key, $val)
{
    return $object->saveData($key, $val);
}

function getData(iWorkData $object, $key)
{
    return $object->getData($key);
}

function deleteData(iWorkData $object, $key)
{
    return $object->deleteData($key);
}