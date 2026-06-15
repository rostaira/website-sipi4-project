<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Landing extends BaseController
{
   
    public function index()
    {
        // $user = $this->auth->user();
        // $session = session();
        // $session->set([  
        //     'username' => $user->username,
        //     'role'     => $user->role?? 2
        // ]);
        
        if (logged_in()) {
            return redirect()->to('/index.php');
        }
        return view('landing_page');
    }
}
