<?php

namespace LotteryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Result
 *
 * @ORM\Table(name="result")
 * @ORM\Entity(repositoryClass="LotteryBundle\Repository\ResultRepository")
 */
class Result
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="round", type="integer", options={"comment":"获奖轮数"})
     */
    private $round;

    /**
     * @var Meet
     * @ORM\ManyToOne(targetEntity="Meet", inversedBy="results")
     */
    private $meet;

    /**
     * @var Prize
     * 
     * @ORM\ManyToOne(targetEntity="Prize", inversedBy="results")
     */
    private $prize;

    /**
     * @var Participant
     *
     * @ORM\OneToOne(targetEntity="Participant", inversedBy="result")
     */
    private $participant;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set round
     *
     * @param integer $round
     *
     * @return Result
     */
    public function setRound($round)
    {
        $this->round = $round;

        return $this;
    }

    /**
     * Get round
     *
     * @return int
     */
    public function getRound()
    {
        return $this->round;
    }

    /**
     * Set meet
     *
     * @param \LotteryBundle\Entity\Meet $meet
     *
     * @return Result
     */
    public function setMeet(\LotteryBundle\Entity\Meet $meet = null)
    {
        $this->meet = $meet;

        return $this;
    }

    /**
     * Get meet
     *
     * @return \LotteryBundle\Entity\Meet
     */
    public function getMeet()
    {
        return $this->meet;
    }

    /**
     * Set prize
     *
     * @param \LotteryBundle\Entity\Prize $prize
     *
     * @return Result
     */
    public function setPrize(\LotteryBundle\Entity\Prize $prize = null)
    {
        $this->prize = $prize;

        return $this;
    }

    /**
     * Get prize
     *
     * @return \LotteryBundle\Entity\Prize
     */
    public function getPrize()
    {
        return $this->prize;
    }

    /**
     * Set participant
     *
     * @param \LotteryBundle\Entity\Participant $participant
     *
     * @return Result
     */
    public function setParticipant(\LotteryBundle\Entity\Participant $participant = null)
    {
        $this->participant = $participant;

        return $this;
    }

    /**
     * Get participant
     *
     * @return \LotteryBundle\Entity\Participant
     */
    public function getParticipant()
    {
        return $this->participant;
    }
}
