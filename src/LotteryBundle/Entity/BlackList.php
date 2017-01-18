<?php

namespace LotteryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlackList
 *
 * @ORM\Table(name="black_list")
 * @ORM\Entity(repositoryClass="LotteryBundle\Repository\BlackListRepository")
 */
class BlackList
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
     * @var Meet
     *
     * @ORM\ManyToOne(targetEntity="Meet", inversedBy="blacklists")
     */
    private $meet;

    /**
     * @var Prize
     *
     * @ORM\OneToOne(targetEntity="Prize", inversedBy="blacklists")
     */
    private $prize;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="Participant", mappedBy="blacklist")
     */
    private $participants;

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
     * Constructor
     */
    public function __construct()
    {
        $this->participants = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set meet
     *
     * @param \LotteryBundle\Entity\Meet $meet
     *
     * @return BlackList
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
     * @return BlackList
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
     * Add participant
     *
     * @param \LotteryBundle\Entity\Participant $participant
     *
     * @return BlackList
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
}
