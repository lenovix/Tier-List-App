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
    public function processTableName()
    {
        $session = session();
        $tableName = $this->request->getPost('tableName');
        $session->set('tableName', $tableName);

        return redirect()->to('/configureTable');
    }
    public function configureTable()
    {
        $session = session();
        $data['tableName'] = $session->get('tableName');

        return view('configure_table', $data);
    }
    public function uploadImage()
    {
        $session = session();
        $img = $this->request->getFile('image');

        if ($img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            // $img->move(WRITEPATH . 'uploads', $newName);
            $img->move(FCPATH . 'uploads', $newName);

            // debug
            error_log('File uploaded: ' . $img->getName());

            $uploadedImages = $session->get('uploadedImages') ?? [];

            $uploadedImages[] = $newName;

            $session->set('uploadedImages', $uploadedImages);
        } else {
            // debug
            error_log('File upload failed: ' . $img->getErrorString());
        }

        return redirect()->to('/configureTable');
    }

    public function updateTableName()
    {
        if ($this->request->isAJAX()) {
            $data = $this->request->getJSON();
            $tableName = $data->tableName;

            // Logika untuk memperbarui nama tabel
            // Simpan nama tabel baru ke sesi
            $session = session();
            $session->set('tableName', $tableName);

            return $this->response->setJSON(['success' => true]);
        }

        return $this->response->setJSON(['success' => false]);
    }

    public function deleteTable()
    {
        if ($this->request->isAJAX()) {
            $data = $this->request->getJSON();
            $tableName = $data->tableName;

            // Logika untuk menghapus tabel
            // Dalam contoh ini, kita hanya menghapus sesi
            $session = session();
            $session->remove('tableName');
            $session->remove('uploadedImages');

            return $this->response->setJSON(['success' => true]);
        }

        return $this->response->setJSON(['success' => false]);
    }
}
