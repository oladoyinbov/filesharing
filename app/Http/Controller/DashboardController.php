<?php

declare(strict_types=1);

namespace App\Http\Controller;

class DashboardController extends \FastVolt\Core\Controller 
{

    /**
     * Dashboard Function
     *
     * @return 
     */
    public function index()
    {
        return $this->response->render('dashboard');
    }


    private function getFileTransferredStats()
    {

    }


    private function getFileRecievedStats()
    {

    }

        
}