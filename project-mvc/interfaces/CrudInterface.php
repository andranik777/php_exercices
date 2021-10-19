<?php
interface CrudInterface{
    public function  findAll();
    public function findOne($id);
    public function insert($object);
    public function update($object);
}