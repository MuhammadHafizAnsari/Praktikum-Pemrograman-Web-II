<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['username', 'email', 'password'];

    protected $useTimestamps = true;

    protected $validationRules    = [
        'username' => 'required|alpha_numeric_space|min_length[3]|is_unique[user.username]',
        'email'    => 'required|valid_email|is_unique[user.email]',
        'password' => 'required|min_length[8]',
    ];
    protected $validationMessages = [
        'username' => [
            'required' => 'Username is required',
            'alpha_numeric_space' => 'Username can only contain alphanumeric characters and spaces',
            'min_length' => 'Username must be at least 3 characters long',
            'is_unique' => 'Username already exists'
        ],
        'email' => [
            'required' => 'Email is required',
            'valid_email' => 'Please enter a valid email address',
            'is_unique' => 'Email already exists'
        ],
        'password' => [
            'required' => 'Password is required',
            'min_length' => 'Password must be at least 8 characters long'
        ]
    ];
    protected $skipValidation     = false;
}