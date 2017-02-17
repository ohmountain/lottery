<?php

namespace LotteryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Meet
 *
 * @ORM\Table(name="meet")
 * @ORM\Entity(repositoryClass="LotteryBundle\Repository\MeetRepository")
 */
class Meet
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
     * @var string
     *
     * @ORM\Column(name="outer_id", type="string")
     */
    private $outer_id;

    /**
     * @var array
     * 年会的奖项
     *
     * @ORM\OneToMany(targetEntity="Prize", mappedBy="meet")
     */
    private $prizes;

    /**
     * @var array
     * 年会的签到用户
     *
     * @ORM\OneToMany(targetEntity="Participant", mappedBy="meet")
     */
    private $participants;

    /**
     * @var array
     * 年会的抽奖结果
     *
     * @ORM\OneToMany(targetEntity="Result", mappedBy="meet")
     */
    private $results;

    /**
     * @var array
     * 年会红名单
     *
     * @ORM\OneToMany(targetEntity="RedList", mappedBy="meet")
     */
    private $redlists;

    /**
     * @var array
     * 年会红名单
     *
     * @ORM\OneToMany(targetEntity="BlackList", mappedBy="meet")
     */
    private $blacklists;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->prizes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->participants = new \Doctrine\Common\Collections\ArrayCollection();
        $this->results = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Get outer_id
     *
     * @return string
     */
    public function getOuterId()
    {
        return $this->outer_id;
    }

    /**
     * Set outer_id
     *
     * @param $outer_id
     * @return Meet
     */
    public function setOuterId($outer_id)
    {
        $this->outer_id = $outer_id;

        return $this;
    }       

    /**
     * Add prize
     *
     * @param \LotteryBundle\Entity\Prize $prize
     *
     * @return Meet
     */
    public function addPrize(\LotteryBundle\Entity\Prize $prize)
    {
        $this->prizes[] = $prize;

        return $this;
    }

    /**
     * Remove prize
     *
     * @param \LotteryBundle\Entity\Prize $prize
     */
    public function removePrize(\LotteryBundle\Entity\Prize $prize)
    {
        $this->prizes->removeElement($prize);
    }

    /**
     * Get prizes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPrizes()
    {
        return $this->prizes;
    }

    /**
     * Add participant
     *
     * @param \LotteryBundle\Entity\Participant $participant
     *
     * @return Meet
     */
    public function addParticipant(\LotteryBundle\Entity\Participant $participant)
    {
        $this->participants[] = $participant;

        return $this;
    }

    /**
     * Remove participant
     *
     * @param \LotteryBundle\Entity\Participant $participant
     */
    public function removeParticipant(\LotteryBundle\Entity\Participant $participant)
    {
        $this->participants->removeElement($participant);
    }

    /**
     * Get participants
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParticipants()
    {
        return $this->participants;
    }

    /**
     * Add result
     *
     * @param \LotteryBundle\Entity\Result $result
     *
     * @return Meet
     */
    public function addResult(\LotteryBundle\Entity\Result $result)
    {
        $this->results[] = $result;

        return $this;
    }

    /**
     * Remove result
     *
     * @param \LotteryBundle\Entity\Result $result
     */
    public function removeResult(\LotteryBundle\Entity\Result $result)
    {
        $this->results->removeElement($result);
    }

    /**
     * Get results
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * Add redlist
     *
     * @param \LotteryBundle\Entity\RedList $redlist
     *
     * @return Meet
     */
    public function addRedlist(\LotteryBundle\Entity\RedList $redlist)
    {
        $this->redlists[] = $redlist;

        return $this;
    }

    /**
     * Remove redlist
     *
     * @param \LotteryBundle\Entity\RedList $redlist
     */
    public function removeRedlist(\LotteryBundle\Entity\RedList $redlist)
    {
        $this->redlists->removeElement($redlist);
    }

    /**
     * Get redlists
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRedlists()
    {
        return $this->redlists;
    }

    /**
     * Add blacklist
     *
     * @param \LotteryBundle\Entity\BlackList $blacklist
     *
     * @return Meet
     */
    public function addBlacklist(\LotteryBundle\Entity\BlackList $blacklist)
    {
        $this->blacklists[] = $blacklist;

        return $this;
    }

    /**
     * Remove blacklist
     *
     * @param \LotteryBundle\Entity\BlackList $blacklist
     */
    public function removeBlacklist(\LotteryBundle\Entity\BlackList $blacklist)
    {
        $this->blacklists->removeElement($blacklist);
    }

    /**
     * Get blacklists
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBlacklists()
    {
        return $this->blacklists;
    }
}
