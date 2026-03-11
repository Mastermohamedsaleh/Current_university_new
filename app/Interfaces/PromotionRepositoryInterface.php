<?php

namespace App\Interfaces;

interface PromotionRepositoryInterface
{

    public function all();
    public function fetchoneitem($id); 
    public function createOrUpdate(array $data);
    public function delete(int $id);
}