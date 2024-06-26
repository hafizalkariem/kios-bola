<?php

namespace App\Controllers;

use App\Models\KlubModel;
use App\Models\JerseyModel;
use App\Models\ApparelModel;
use \Myth\Auth\Models\UserModel;
use App\Config\Services;

class Profile extends BaseController
{
    protected $JerseyModel;
    protected $KlubModel;
    protected $ApparelModel;
    protected $UserModel;

    public function __construct()
    {
        $this->KlubModel = new KlubModel();
        $this->JerseyModel = new JerseyModel();
        $this->ApparelModel = new ApparelModel();
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        $user = user(); // Assuming user() fetches logged-in user data

        $data = [
            'title' => 'Profile',
            'activePage' => 'jersey',
            'user' => $user
        ];

        return view('profile/index', $data);
    }
}
