<?php

namespace App\Controllers;

use App\Models\ChartModel;

class ChartController extends BaseController
{
    protected $chartModel;

    public function __construct()
    {
        $this->chartModel = new ChartModel();
    }

    public function index()
    {
        return view('chart/index');
    }

    public function getChartData()
    {
        $year = $this->request->getGet('year');
        if (!$year) {
            return $this->response->setJSON(['error' => 'Year parameter is required']);
        }

        $chartData = $this->chartModel->getChartData($year);
        $totalMembers = $this->chartModel->getTotalMembers($year);

        $labels = [];
        $data = [];

        foreach ($chartData as $row) {
            $labels[] = $row['month'];
            $data[] = $row['count'];
        }

        $response = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'จำนวนสมาชิก',
                    'backgroundColor' => '#007bff',
                    'data' => $data
                ]
            ],
            'total_count' => $totalMembers
        ];

        return $this->response->setJSON($response);
    }
}
