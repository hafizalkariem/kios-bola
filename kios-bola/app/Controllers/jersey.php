<?php

namespace App\Controllers;

class jersey extends BaseController
{
    public function manchester_united()
    {
        $data = [
            'title' => 'jersey | MU',
            'activePage' => 'pricing'
        ];
        return view('jersey/manchester_united', $data);
    }
    public function liverpool()
    {
        $data = [
            'title' => 'jersey | Liverpool',
            'activePage' => 'pricing'
        ];
        return view('jersey/liverpool', $data);
    }
    public function barcelona()
    {
        $data = [
            'title' => 'jersey | FC Barcelona',
            'activePage' => 'pricing'
        ];
        return view('jersey/barcelona', $data);
    }
    public function manchester_city()
    {
        $data = [
            'title' => 'jersey | Man City',
            'activePage' => 'pricing'
        ];
        return view('jersey/manchester_city', $data);
    }
    public function psg()
    {
        $data = [
            'title' => 'jersey | PSG',
            'activePage' => 'pricing'
        ];
        return view('jersey/psg', $data);
    }
    public function bayern_muenchen()
    {
        $data = [
            'title' => 'jersey | Bayern Munich',
            'activePage' => 'pricing'
        ];
        return view('jersey/bayern_muenchen', $data);
    }
}
