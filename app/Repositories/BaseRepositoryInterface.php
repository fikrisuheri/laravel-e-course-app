<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    public function get();
    public function find($id);
    public function store($attributes, $isFile = false, $field = null, $folder = null);
    public function update($id, $attributes, $isFile = false, $field = null, $folder = null);
    public function delete($id);
    public function Query();
}