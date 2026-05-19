<?php

namespace App\Controllers;

use App\Models\User; // On importe le modèle ici

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

        $userModel = new User();
        
        // 1. On cherche l'utilisateur par son email
        $user = $userModel->where('email', $email)->first();

        // 2. On vérifie si l'utilisateur existe ET si le mot de passe est correct
        if ($user && password_verify($password, $user['password'])) {
            
            // On stocke les infos utiles en session
            session()->set([
                'user_id'    => $user['id'],
                'user_nom'   => $user['nom'],
                'user_role'  => $user['role'],
                'isLoggedIn' => true
            ]);

            return $this->response->setJSON([
                'success'  => true,
                'redirect' => base_url('/dashboard') // Adapte selon ta route
            ]);
        }

        // Si ça échoue
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

        // Validation basique
        if (empty($nom) || empty($email) || empty($password)) {
            return $this->response->setStatusCode(400)->setJSON([
                'success' => false,
                'message' => 'Tous les champs sont obligatoires.'
            ]);
        }

        $userModel = new User();

        // Vérification si l'email existe déjà (pour éviter l'erreur SQLite unique de l'autre fois)
        if ($userModel->where('email', $email)->first()) {
            return $this->response->setStatusCode(400)->setJSON([
                'success' => false,
                'message' => 'Cet email est déjà utilisé.'
            ]);
        }

        // Préparation des données (le modèle s'occupera de hacher le password)
        $userData = [
            'nom'      => $nom,
            'email'    => $email,
            'password' => $password,
            'role'     => 'client' // Rôle par défaut sécurisé
        ];

        // Insertion dans la base SQLite
        if ($userModel->insert($userData)) {
            return $this->response->setJSON([
                'success'  => true,
                'message'  => 'Inscription réussie ! Vous pouvez vous connecter.',
                'redirect' => base_url('/')
            ]);
        }

        return $this->response->setStatusCode(500)->setJSON([
            'success' => false,
            'message' => 'Une erreur est survenue lors de l\'inscription.'
        ]);
    }
}