<?php

namespace LotteryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participant
 *
 * @ORM\Table(name="participant")
 * @ORM\Entity(repositoryClass="LotteryBundle\Repository\ParticipantRepository")
 */
class Participant
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
     * @ORM\Column(name="open_id", type="string", length=255, options={"comment":"签到用户的open_id"})
     */
    private $openId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, options={"comment":"签到的用户名"})
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, options={"comment":"用户头像url"})
     */
    private $image;

    /**
     * @var Meet
     *
     * @ORM\ManyToOne(targetEntity="Meet", inversedBy="participants")
     */
    private $meet;

    /**
     * @var Result
     *
     * @ORM\OneToOne(targetEntity="Result", mappedBy="participant")
     */
    private $result;

    /**
     * @var RedList
     *
     * @ORM\ManyToOne(targetEntity="RedList", inversedBy="participants")
     */
    private $redlist;

    /**
     * @var BlackList
     *
     * @ORM\ManyToOne(targetEntity="BlackList", inversedBy="participants")
     */
    private $blacklist;

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
     * Set openId
     *
     * @param string $openId
     *
     * @return Participant
     */
    public function setOpenId($openId)
    {
        $this->openId = $openId;

        return $this;
    }

    /**
     * Get openId
     *
     * @return string
     */
    public function getOpenId()
    {
        return $this->openId;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Participant
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Participant
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set meet
     *
     * @param \LotteryBundle\Entity\Participant $meet
     *
     * @return Participant
     */
    public function setMeet(\LotteryBundle\Entity\Participant $meet = null)
    {
        $this->meet = $meet;

        return $this;
    }

    /**
     * Get meet
     *
     * @return \LotteryBundle\Entity\Participant
     */
    public function getMeet()
    {
        return $this->meet;
    }

    /**
     * Set result
     *
     * @param \LotteryBundle\Entity\Result $result
     *
     * @return Participant
     */
    public function setResult(\LotteryBundle\Entity\Result $result = null)
    {
        $this->result = $result;

        return $this;
    }

    /**
     * Get result
     *
     * @return \LotteryBundle\Entity\Result
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Set redlist
     *
     * @param \LotteryBundle\Entity\RedList $redlist
     *
     * @return Participant
     */
    public function setRedlist(\LotteryBundle\Entity\RedList $redlist = null)
    {
        if (!$this->getBlacklist()) {
            $this->redlist = $redlist;
        }

        return $this;
    }

    /**
     * Get redlist
     *
     * @return \LotteryBundle\Entity\RedList
     */
    public function getRedlist()
    {
        return $this->redlist;
    }

    /**
     * Set blacklist
     *
     * @param \LotteryBundle\Entity\BlackList $blacklist
     *
     * @return Participant
     */
    public function setBlacklist(\LotteryBundle\Entity\BlackList $blacklist = null)
    {
        if (!$this->getRedlist()) {
            $this->blacklist = $blacklist;
        }

        return $this;
    }

    /**
     * Get blacklist
     *
     * @return \LotteryBundle\Entity\BlackList
     */
    public function getBlacklist()
    {
        return $this->blacklist;
    }
}
