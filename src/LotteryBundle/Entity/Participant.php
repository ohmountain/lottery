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
     * @ORM\Column(name="open_id", type="string", length=255, unique=true)
     */
    private $openId;

    /**
     * @var string
     *
     * @ORM\Column(name="autograph", type="string", length=255)
     */
    private $autograph;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;


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
     * Set autograph
     *
     * @param string $autograph
     *
     * @return Participant
     */
    public function setAutograph($autograph)
    {
        $this->autograph = $autograph;

        return $this;
    }

    /**
     * Get autograph
     *
     * @return string
     */
    public function getAutograph()
    {
        return $this->autograph;
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
}

