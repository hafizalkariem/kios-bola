<?php

namespace App\Controllers;

class page extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'kios bola',
            'activePage' => 'home'
        ];
        return view('pages/index', $data);
    }
    public function about()
    {
        $data = [
            'title' => 'About us',
            'activePage' => 'about'
        ];
        return view('pages/about', $data);
    }
    public function contact()
    {
        $data = [
            'title' => 'contact us',
            'activePage' => 'contact'
        ];
        return view('pages/contact', $data);
    }
    public function pricing()
    {
        $data = [
            'title' => 'shoping',
            'activePage' => 'pricing'
        ];
        return view('pages/pricing', $data);
    }
}
