<?php namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table      = 'buku';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['judul', 'penulis', 'penerbit', 'tahun_terbit'];

    protected $useTimestamps = false;
    
    protected $validationRules = [
        'judul' => 'required|string',
        'penulis' => 'required|string',
        'penerbit' => 'required|string',
        'tahun_terbit' => 'required|numeric|greater_than[1800]|less_than[2024]'
    ];
    protected $validationMessages = [
        'judul' => [
            'required' => 'Judul harus diisi',
            'string' => 'Judul harus berupa string'
        ],
        'penulis' => [
            'required' => 'Penulis harus diisi',
            'string' => 'Penulis harus berupa string'
        ],
        'penerbit' => [
            'required' => 'Penerbit harus diisi',
            'string' => 'Penerbit harus berupa string'
        ],
        'tahun_terbit' => [
            'required' => 'Tahun Terbit harus diisi',
            'numeric' => 'Tahun Terbit harus berupa angka',
            'greater_than' => 'Tahun Terbit harus lebih besar dari 1800',
            'less_than' => 'Tahun Terbit harus kurang dari 2024'
        ]
    ];
}