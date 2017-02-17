<?php

namespace LotteryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prize
 *
 * @ORM\Table(name="prize")
 * @ORM\Entity(repositoryClass="LotteryBundle\Repository\PrizeRepository")
 */
class Prize
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, options={"comment":"奖项名称"})
     */
    private $title = ' ';

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, options={"comment":"奖项图片"})
     */
    private $image = 'default.png';

    /**
     * @var int
     *
     * @ORM\Column(name="count", type="integer", options={"comment":"奖品数量"})
     */
    private $count = 1;

    /**
     * @var int
     *
     * @ORM\Column(name="one_time_count", type="integer", options={"comment":"一次抽取的人数"})
     */
    private $one_time_count = 1;

    /**
     * @var int
     *
     * @ORM\Column(name="round", type="integer", options={"comment":"当前第几轮"})
     */
    private $round = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, options={"comment":"奖品名称"})
     */
    private $name = '';

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="smallint", length=1, options={"comment":"奖项状态：-1为已完成，0为停止，1为正在进行"})
     */
    private $status = 0;

    /**
     * @var bool
     *
     * @ORM\Column(name="deleted", type="boolean", options={"comment":"是否已经删除"})
     */
    private $deleted = false;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", options={"comment":"创建时间"})
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", options={"comment":"更新时间"})
     */
    private $updatedAt;

    /**
     * @var Meet
     *
     * @ORM\ManyToOne(targetEntity="Meet", inversedBy="prizes")
     */
    private $meet;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="Result", mappedBy="prize")
     */
    private $results;

    /**
     * @var array
     * 奖项红名单
     *
     * @ORM\OneToOne(targetEntity="RedList", mappedBy="prize")
     */
    private $redlists;

    /**
     * @var array
     * 奖项黑名单
     *
     * @ORM\OneToOne(targetEntity="BlackList", mappedBy="prize")
     */
    private $blacklists;



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
     * @param string $outer_id
     * @return Prize
     */
    public function setOuterId($outer_id)
    {
        $this->outer_id = $outer_id;

        return $this;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Prize
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Prize
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
     * Set count
     *
     * @param integer $count
     *
     * @return Prize
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * Get count
     *
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Set round
     *
     * @param integer $round
     *
     * @return Prize
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
     * Set name
     *
     * @param string $name
     *
     * @return Prize
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Prize
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Prize
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->results = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set oneTimeCount
     *
     * @param integer $oneTimeCount
     *
     * @return Prize
     */
    public function setOneTimeCount($oneTimeCount)
    {
        $this->one_time_count = $oneTimeCount;

        return $this;
    }

    /**
     * Get oneTimeCount
     *
     * @return integer
     */
    public function getOneTimeCount()
    {
        return $this->one_time_count;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Prize
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set deleted
     *
     * @param boolean $deleted
     *
     * @return Prize
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Get deleted
     *
     * @return boolean
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * Set meet
     *
     * @param \LotteryBundle\Entity\Meet $meet
     *
     * @return Prize
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
     * Add result
     *
     * @param \LotteryBundle\Entity\Result $result
     *
     * @return Prize
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
     * Set redlists
     *
     * @param \LotteryBundle\Entity\RedList $redlists
     *
     * @return Prize
     */
    public function setRedlists(\LotteryBundle\Entity\RedList $redlists = null)
    {
        $this->redlists = $redlists;

        return $this;
    }

    /**
     * Get redlists
     *
     * @return \LotteryBundle\Entity\RedList
     */
    public function getRedlists()
    {
        return $this->redlists;
    }

    /**
     * Set blacklists
     *
     * @param \LotteryBundle\Entity\BlackList $blacklists
     *
     * @return Prize
     */
    public function setBlacklists(\LotteryBundle\Entity\BlackList $blacklists = null)
    {
        $this->blacklists = $blacklists;

        return $this;
    }

    /**
     * Get blacklists
     *
     * @return \LotteryBundle\Entity\BlackList
     */
    public function getBlacklists()
    {
        return $this->blacklists;
    }
}
