<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginProcess()
    {
        $username = trim($this->request->getPost('username'));
        $password = $this->request->getPost('password');

        // Check if fields are empty
        if (empty($username) || empty($password)) {
            return redirect()
                ->to(base_url('index.php/login'))
                ->with('error', 'Please enter your username and password.');
        }

        // Find user by username
        $user = $this->userModel
            ->where('username', $username)
            ->first();

        // Check if user exists
        if (!$user) {
            return redirect()
                ->to(base_url('index.php/login'))
                ->with('error', 'Invalid username or password.');
        }

        // Check password
        if (!password_verify($password, $user['password'])) {
            return redirect()
                ->to(base_url('index.php/login'))
                ->with('error', 'Invalid username or password.');
        }

        // Start session
        $session = session();

        $session->set([
            'user_id'     => $user['id'],
            'username'    => $user['username'],
            'isLoggedIn'  => true
        ]);

        // Redirect to protected Customer page
        return redirect()->to(base_url('index.php/customers'));
    }

    public function logout()
    {
        session()->destroy();

        return redirect()
            ->to(base_url('index.php/login'))
            ->with('success', 'You have been logged out successfully.');
    }
}