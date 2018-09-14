<?php

namespace App\Repositories\Contracts;

interface BaseRepository
{
    public function getAll();

    public function find($id);

    public function save($data);

    public function update($id, $data);

    public function delete($id);
}
