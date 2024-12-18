<?php

namespace App\Models;

use CodeIgniter\Model;

class QueueModel extends Model
{
    protected $table            = 'queues';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object'; // Mengembalikan objek
    protected $useSoftDeletes   = true; // Menggunakan soft deletes;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id',
        'queue_number',
        'status',
        'desc',
        'action_by',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true; // Menggunakan timestamps;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'user_id'      => 'required',
    ];
    protected $validationMessages   = [
        'user_id'      => [
            'required' => 'User wajib diisi',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [
        'updateQueueNumber',
    ];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected function updateQueueNumber(array $data)
    {
        $id = $data['id'];
        $this->update($id, ['queue_number' => 'Q' . $id]);
        return $data;
    }

    public function getAllData()
    {
        return $this
            ->select('queues.*, users.name as nama, users.email as user_email')
            ->join('users', 'users.id = queues.user_id')
            ->where('queues.deleted_at', null)
            ->orderBy('(CASE WHEN status = "menunggu" THEN 1 ELSE 0 END)', 'DESC')
            ->orderBy('status', 'ASC')
            ->findAll();
    }

    public function cetakLaporan($startDate, $endDate)
    {
        return $this
            ->select('queues.*, users.name as nama, users.email as user_email')
            ->join('users', 'users.id = queues.user_id')
            ->where('queues.deleted_at', null)
            ->where('queues.created_at >=', $startDate . ' 00:00:00')
            ->where('queues.created_at <=', $endDate . ' 23:59:59')
            ->findAll();
    }
}
