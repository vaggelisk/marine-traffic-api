<?php

namespace App\Entity;

use App\Repository\VesselRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\RangeFilter;
use Symfony\Component\HttpFoundation\Request;



/**
 * @ORM\Entity(repositoryClass=VesselRepository::class)
 */
#[ApiResource(collectionOperations: ['get', "post_track" ], itemOperations: ['get', ] )]
#[ApiFilter(SearchFilter::class, properties: ['mmsi' => 'exact'])]
#[ApiFilter(RangeFilter::class, properties: ['lon', 'lat'])]
class Vessel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $mmsi;

    /**
     * @ORM\Column(type="integer")
     */
    private $status;

    /**
     * @ORM\Column(type="integer")
     */
    private $stationId;

    /**
     * @ORM\Column(type="smallint")
     */
    private $speed;

    /**
     * @ORM\Column(type="float")
     */
    private $lon;

    /**
     * @ORM\Column(type="float")
     */
    private $lat;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $course;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $heading;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $rot;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $timestamp;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $clientIp ;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMmsi(): ?int
    {
        return $this->mmsi;
    }

    public function setMmsi(int $mmsi): self
    {
        $this->mmsi = $mmsi;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getStationId(): ?int
    {
        return $this->stationId;
    }

    public function setStationId(int $stationId): self
    {
        $this->stationId = $stationId;

        return $this;
    }

    public function getSpeed(): ?int
    {
        return $this->speed;
    }

    public function setSpeed(int $speed): self
    {
        $this->speed = $speed;

        return $this;
    }

    public function getLon(): ?float
    {
        return $this->lon;
    }

    public function setLon(float $lon): self
    {
        $this->lon = $lon;

        return $this;
    }

    public function getLat(): ?float
    {
        return $this->lat;
    }

    public function setLat(float $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getCourse(): ?float
    {
        return $this->course;
    }

    public function setCourse(?float $course): self
    {
        $this->course = $course;

        return $this;
    }

    public function getHeading(): ?float
    {
        return $this->heading;
    }

    public function setHeading(?float $heading): self
    {
        $this->heading = $heading;

        return $this;
    }

    public function getRot(): ?string
    {
        return $this->rot;
    }

    public function setRot(?string $rot): self
    {
        $this->rot = $rot;

        return $this;
    }

    public function getTimestamp(): ?\DateTimeInterface
    {
        return $this->timestamp;
    }



    public function setTimestamp(\DateTimeInterface $timestamp): self
    {
        $this->timestamp =  new DateTime( 'now' );
        return $this;
    }

    public function getClientIp(): ?string
    {
        return $this->clientIp;
    }

    /**
     * @param null|string $clientIp
     * @return Vessel
     */
    public function setClientIp( ?string $clientIp): self
    {
        $this->clientIp =  Request::createFromGlobals()->getClientIp();

        return $this;
    }

}
