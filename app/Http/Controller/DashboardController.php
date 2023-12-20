<?php

declare(strict_types=1);

namespace App\Http\Controller;

use App\Model\Files;
use Fastvolt\Helper\Session;

class DashboardController extends \Fastvolt\Core\Controller
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


    public function stats(): string
    {
        sleep(2);
        return '
        <div class="container mb-4">
        <div class="row">
          
          <div class="col-lg-4 col-md-6" style="margin-top: 20px">
            <div class="card border-danger">
              <div class="card-body bg-danger text-white">
                <div class="row">
                  <div class="col-3">
                    <i class="fad fa-file-export fa-3x"></i>
                  </div>
                  <div class="col-9 text-right">
                    <h1>60</h1>
                    <h4>File Transferred</h4>
                  </div>
                </div>
              </div>
              <a href="">
                <div class="card-footer bg-light text-danger">
                  <span class="float-left">More details</span>
                  <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
                </div>
              </a>
            </div>
          </div>
      
      
          <div class="col-lg-4 col-md-6" style="margin-top: 20px">
            <div class="card border-warning">
              <div class="card-body bg-warning text-white">
                <div class="row">
                  <div class="col-3">
                    <i class="fad fa-file-download fa-3x"></i>
                  </div>
                  <div class="col-9 text-right">
                    <h1>4</h1>
                    <h4>File Recieved</h4>
                  </div>
                </div>
              </div>
              <a href="">
                <div class="card-footer bg-light text-warning">
                  <span class="float-left">More details</span>
                  <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
                </div>
              </a>
            </div>
          </div>
      
      
          <div class="col-lg-4 col-md-6" style="margin-top: 20px">
            <div class="card border-info">
              <div class="card-body bg-info text-white">
                <div class="row">
                  <div class="col-3">
                    <i class="fad fa-folder-minus fa-3x"></i>
                  </div>
                  <div class="col-9 text-right">
                    <h1>' . $this->getTotalFiles() . '</h1>
                    <h4>Total Files</h4>
                  </div>
                </div>
              </div>
              <a href="' . route('dash_myfiles') . '">
                <div class="card-footer bg-light text-info">
                  <span class="float-left">More details</span>
                  <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
                </div>
              </a>
            </div>
          </div>
      
        </div>
      </div>
      </div>';
    }


    private function getFileTransferredStats()
    {

    }


    private function getFileRecievedStats()
    {

    }


    private function getTotalFiles(): int
    {
        return (new Files)
            ->where(['user' => Session::get('fs_user')])
            ->num_rows() ?? 0;
    }
}