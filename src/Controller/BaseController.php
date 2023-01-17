<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\LibrariesIOService;

class BaseController extends AbstractController
{
    public function __construct(protected LibrariesIOService $librariesIOService)
    {
    }
}
