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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

