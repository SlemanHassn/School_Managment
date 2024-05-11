<?php

namespace App\Repository;

interface PromotionsRepositoryInterface
{
    public function indexPromotions();
    public function storePromotions($request);
    public function createPromotions();
    public function destroyPromotions($request);

}
