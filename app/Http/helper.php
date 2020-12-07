<?php 

function getAllData($query)
{
    return $query->where('deleted_status',null)->get();
}

