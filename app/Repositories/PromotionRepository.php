<?php

namespace App\Repositories;

use App\Models\Promotion;

use App\Interfaces\PromotionRepositoryInterface;

class PromotionRepository implements PromotionRepositoryInterface
{

    public function all()
    {
        return Promotion::all();
    }


    public function fetchoneitem($id) 
    {
        return  Promotion::findorfail($id);
    }

     public function createOrUpdate(array $data)
    {
        return Promotion::updateOrCreate($data);
    }

     public function delete(int $id)
    {
        return Promotion::destroy($id) > 0;
    }
}