<?php

namespace App\Models;

use CodeIgniter\Model;

class ChartModel extends Model
{
    protected $table = 'ekyc_data'; // ชื่อ Table ในฐานข้อมูล
    protected $primaryKey = 'id';

    public function getChartData($year)
    {
        return $this->select('MONTH(created_at) as month, COUNT(*) as count')
            ->where('YEAR(created_at)', $year)
            ->groupBy('MONTH(created_at)')
            ->orderBy('MONTH(created_at)', 'ASC')
            ->findAll();
    }

    public function getTotalMembers($year)
    {
        return $this->where('YEAR(created_at)', $year)->countAllResults();
    }
}
