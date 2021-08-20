<?php

namespace App\Controller;

use App\Entity\Vessel;
use App\Handler\VesselTrackHandler;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;
use Symfony\Component\Routing\Annotation\Route;


#[AsController]
class VesselController extends AbstractController
{

    public function create(Vessel $data): Vessel
    {

        $timestampCritical = new DateTime( '-1 hour' );

        $tracksOfLastHour = $this->getDoctrine()
            ->getRepository(Vessel::class)
            ->findBy([ 'clientIp' => $data->getClientIp()], ['timestamp' => 'DESC'], 10, 0);


        $timestampOfTenth = ( array_values($tracksOfLastHour)[9] ?  array_values($tracksOfLastHour)[9]->getTimestamp() : '' );

        if ( count($tracksOfLastHour)==10 && $timestampOfTenth > $timestampCritical ){
            throw new ConflictHttpException('There are  already 10 tracks for this vessel the last hour' );
        } else {
            return $data;
        }
    }


}