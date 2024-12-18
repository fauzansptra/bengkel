<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\QueueModel;
use App\Models\ReportModel;
use Dompdf\Dompdf;

class Report extends BaseController
{
    public function __construct()
    {
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('forbidden')->send();
        }
    }

    public function index()
    {
        helper('form');
        $data = [
            'title' => 'Cetak Laporan',
        ];
        return view('report/index', $data);
    }

    public function generatePdf($startDate = null, $endDate = null)
    {
        helper('date');
        $startDate = $this->request->getPost('start_date');
        $endDate = $this->request->getPost('end_date');

        $model = new QueueModel();
        $data = [
            'title' => "Laporan " . format_date($startDate) . " s.d. " . format_date($endDate),
            'getData' => $model->cetakLaporan($startDate, $endDate),
        ];

        // Load view
        $html = view('report/pdf', $data);

        // Initialize Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("Laporan_" . date('Y-m-d_H-i-s') . ".pdf");
    }
}
