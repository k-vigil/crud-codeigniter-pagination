<?php

namespace App\Models;

use CodeIgniter\Model;

class CompanyModel extends Model {

    
    protected $table = 'companies';
    protected $primaryKey = 'id';
    
    protected $useAutoIncrement = true;
    
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    
    protected $allowedFields = ['name', 'nit', 'nrc', 'city'];

    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $validationRules = [
        'name'     => 'required',
        'nit'        => 'required|regex_match[[0-9]{4}[-][0-9]{6}[-][0-9]{3}[-][0-9]{1}]',
        'nrc'     => 'required',
        'city' => 'required',

    ];
    protected $validationMessages = [
        'name'        => [
            'required' => 'Company name is required',
        ],
        'nit'        => [
            'required' => 'NIT is required',
            'regex_match' => 'Nit pattern 0000-000000-000-0',
        ],
        'nrc'        => [
            'required' => 'NRC is required',
        ],
        'city'        => [
            'required' => 'City is required',
        ],
    ];
    protected $skipValidation = false;
}
