<?php

namespace App\Interfaces;

interface RestaurantRepositoryInterface 
{
    public function getAll();

    public function getByID(int $id);

    public function delete(int $id);

    public function update(array $data); 

    public function store(array $data);

}