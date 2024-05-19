<?php

// namespace App\Controllers;

// class Home extends BaseController
// {
//     public function index(): string
//     {
//         return view('welcome_message');
//     }
// }


namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function createTable()
    {
        return view('create_table');
    }
    public function submitTableConfig()
    {
        $tableName = $this->request->getPost('tableName');
        $tableIcon = $this->request->getPost('tableIcon');
        $ranks = $this->request->getPost('ranks');
        if (empty($ranks)) {
            return redirect()->back()->with('error', 'At least one rank must be selected.');
        }
        return view('table_view', [
            'tableName' => $tableName,
            'tableIcon' => $tableIcon,
            'ranks' => $ranks
        ]);
    }
}
