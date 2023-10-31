<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{

    public function index()
    {
        
        $data['title'] = 'Dashboard';
        $data['dashboard_active'] = 'curr-active';
        $data['visitor'] = getVisitor();
        return view('admin/dashboard', $data);
    }
}
