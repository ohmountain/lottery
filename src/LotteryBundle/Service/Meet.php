<?php

/**
 * @author renshan <1005110700@qq.com>
 */

namespace LotteryBundle\Service;

use LotteryBundle\Entity\Meet as MeetEntity;
use LotteryBundle\Entity\Participant;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Meet
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param $meet_id
     * @return MeetEntity $meet
     */
    public function createMeet($meet_id)
    {
        $meet = new MeetEntity;
        $meet->setOuterId($meet_id);

        $em = $this->container->get('doctrine')->getManager();
        $em->persist($meet);
        $em->flush();

        return $meet;
    }

    /**
     * @param MeetEntity $meet
     * @param array $participants
     * @return int
     */
    public function addParticipants(MeetEntity $meet, Array $participants)
    {
        $existed_open_ids = $this->getParticipantsOpenIds($meet);

        $em = $this->container->get('doctrine')->getMananger();

        $inserted_count = 0;

        foreach ($participants as $participant) {
            $open_id    = $participant['open_id'];

            if (in_array($existed_open_ids, $open_id)) {
                continue;
            }

            $image      = $participant['headimgurl'];
            $name       = $participant['nickname'];

            $participant_entity = new Participant;
            $participant->setMeet($meet);
            $participant->setOpenId($open_id);
            $participant->setName($name);
            $participant->setImage($image);
            $participant->setType(0);

            $em->persist($participant);
            $inserted_count ++;
        }

        $em->flush();

        return $inserted_count;
    }


    /**
     * @param MeetEntity $meet
     * @return array
     */
    public function getParticipantsAsArray(MeetEntity $meet)
    {
        $participants = $meet->getParticipants();

        $ret = [];

        foreach ($participants as $participant) {
            $tmp = [];

            $tmp['id']      = $participant->getId();
            $tmp['open_id'] = $participant->getOpenId();
            $tmp['type']    = $participant->getType();
            $tmp['name']    = $participant->getName();
            $tmp['image']   = $participant->getImage();

            array_push($ret, $tmp);
        }

        return $ret;
    }

    /**
     * @param MeetEntity $meet
     * @return array
     */
    public function getParticipantsOpenIds(MeetEntity $meet)
    {
        $participants = $this->getParticipantsAsArray($meet);

        $open_ids = [];

        foreach ($participants as $participant) {
            array_push($open_ids, $participant['open_id']);
        }

        return $open_ids;
    }
}
