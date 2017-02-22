<?php

/**
 * 抽奖组件设计时部分
 * @author renshan<1005110700@qq.com>
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DesignController extends Controller
{
    /**
     * 通过调用这个API新建一个抽奖
     */
    public function createAction(Request $request)
    {

        $meet_id = $request->get('meet_id');
    
        $meet_service   = $this->get('lottery.design.meet');
        $prize_service  = $this->get('lottery.design.prize');

        $meet = $meet_service->getOrCreateMeet($meet_id);

        $prize = $prize_service->createPrize($meet);

        dump($prize);

        $response = new Response;

        return $response;
    }
}

