<?php

namespace App\Interfaces;

interface ReservationRepositoryInterface 
{
    public function getAll();

    public function getByID(int $id);

    public function getByUserId(int $userId);

    public function getByRestaurantId(int $restaurantId);

    public function delete(int $id);

    public function update(array $data); 

    public function store(array $data);

}