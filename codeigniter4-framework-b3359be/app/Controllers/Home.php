<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('index');
    }


public function login()
{
    $email    = $this->request->getPost('email');
    $password = $this->request->getPost('mdp');

    if ($email === 'test@exemple.com' && $password === 'password123') {
        session()->set(['user_id' => 1, 'isLoggedIn' => true]);

        return $this->response->setJSON([
            'success'  => true,
            'redirect' => base_url('/dashboard')
        ]);
    }

    return $this->response->setStatusCode(401)->setJSON([
        'success' => false,
        'message' => 'Identifiants incorrects.'
    ]);
}


    public function inscription()
    {
        $nom      = $this->request->getPost('nom');
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('mdp');

        if (empty($nom) || empty($email) || empty($password)) {
            return $this->response->setStatusCode(400)->setJSON([
                'success' => false,
                'message' => 'Tous les champs sont obligatoires.'
            ]);
        }

        return $this->response->setJSON([
            'success'  => true,
            'redirect' => base_url('/')
        ]);
    }

}
