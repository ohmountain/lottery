<?php

/**
 * 有关奖项功能实现的实现部分
 *
 * @author renshan<1005110700@qq.com>
 */

namespace LotteryBundle\Service;

use LotteryBundle\Entity\Meet as MeetEntity;
use LotteryBundle\Entity\Prize as PrizeEntity;

use Symfony\Component\DependencyInjection\ContainerInterface;

class Prize
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * 新建一个抽奖
     *
     * @param MeetEntity $meet
     * @return PrizeEntity $prize
     */
    public function createPrize(MeetEntity $meet)
    {
        $prize = new PrizeEntity;
        $outer_id = md5(uniqid(mt_rand(), true));

        $prize->setMeet($meet);
        $prize->setCreatedAt(new \DateTime());
        $prize->setUpdatedAt(new \DateTime());
        $prize->setTitle(' ');
        $prize->setImage('default.png');
        $prize->setCount(1);
        $prize->setOneTimeCount(1);
        $prize->setRound(0);
        $prize->setName(' ');
        $prize->setStatus(0);
        $prize->setDeleted(false);
        $prize->setOuterId($outer_id);

        $em = $this->container->get('doctrine')->getManager();
        $em->persist($prize);
        $em->flush();

        return $prize;
    }

    /**
     * 复制一个抽奖
     */
    public function copyPrize($meet_outer_id, $prize_outer_id)
    {
        $em = $this->get('doctrine')->getManager();

        $meet_repo  = $this->container->get('doctrine')->getRepository("LotteryBundle:Meet");
        $prize_repo = $this->container->get('doctrine')->getRepository("LotteryBundle:Prize");

        $meet = $meet_repo->find(['outer_id' => $meet_outer_id]);

        /** 未完成 **/
    }
}
