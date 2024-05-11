<?php

namespace App\Http\Controllers;

use App\Models\promotions;
use App\Repository\PromotionsRepositoryInterface;
use Illuminate\Http\Request;

class PromotionsController extends Controller
{

    protected $Promotions;
    public function __construct(PromotionsRepositoryInterface $Promotions)
    {
        $this->Promotions = $Promotions;
    }

    public function index()
    {
        return $this->Promotions->indexPromotions();
    }
    public function store(Request $request)
    {
        return $this->Promotions->storePromotions($request);
    }
    public function create(){
        return $this->Promotions->createPromotions();
    }
    public function destroy( Request $request){
        return $this->Promotions->destroyPromotions($request);
    }

}
