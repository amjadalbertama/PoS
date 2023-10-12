<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class SalesController extends Controller
{
    public function index(Request $request)
    {
        $dataSales = [
            [
                'id' => 1,
                'code' => 'BA001',
                'name' => 'Natadecoco',
                'price' => 15000,
                'stock' => 1,
                'discount' => "30%",
                'total' => "10500",
            ],
            [
                'id' => 2,
                'code' => 'BA002',
                'name' => 'Mie Instan',
                'price' => 5000,
                'stock' => 2,
                'discount' => "30%",
                'total' => "8500",
            ],
            
            // Add more dummy data here
        ];

        $perPage = 3; // Jumlah item per halaman

        $currentPage = max(1, $request->query('page', 1));
    
        $startIndex = ($currentPage - 1) * $perPage;
        $slicedData = array_slice($dataSales, $startIndex, $perPage);
    
        $paginator = new Paginator(
            $slicedData,
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );
    
        return view('pages.transaction.sales')->with([
            "dataSales" => $dataSales,
            'pagination' => $paginator,
            'currentPage' => $currentPage,
            'perPage' => $perPage,
            'request' => $request,
            'startIndex' => $startIndex,
        ]);
    }

    public function viewStockIn(Request $request)
    {
        $dataStockIn = [
            [
                'id' => 1,
                'code' => 'BA001',
                'name' => 'Natadecoco',
                'stock' => 10,
                'date' => "13/12/2024",
               
            ],
            [
                'id' => 2,
                'code' => 'BA002',
                'name' => 'Mie Instan',
                'stock' => 20,
                'date' => "13/12/2024",
            ],
            
            // Add more dummy data here
        ];

        $perPage = 3; // Jumlah item per halaman

        $currentPage = max(1, $request->query('page', 1));
    
        $startIndex = ($currentPage - 1) * $perPage;
        $slicedData = array_slice($dataStockIn, $startIndex, $perPage);
    
        $paginator = new Paginator(
            $slicedData,
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );
    
        return view('pages.transaction.stockin')->with([
            "dataStockIn" => $dataStockIn,
            'stockInPag' => $paginator,
            'currentPage' => $currentPage,
            'perPage' => $perPage,
            'request' => $request,
            'startIndex' => $startIndex,
        ]);
    }

    public function viewStockOut(Request $request)
    {
        $dataStockIn = [
            [
                'id' => 1,
                'code' => 'BA001',
                'name' => 'Natadecoco',
                'stock' => 1,
                'detail' => 'rusak',
                'date' => "13/12/2024",
               
            ],
            [
                'id' => 2,
                'code' => 'BA002',
                'name' => 'Mie Instan',
                'stock' => 2,
                'detail' => 'cacat',
                'date' => "13/12/2024",
            ],
            
            // Add more dummy data here
        ];

        $perPage = 3; // Jumlah item per halaman

        $currentPage = max(1, $request->query('page', 1));
    
        $startIndex = ($currentPage - 1) * $perPage;
        $slicedData = array_slice($dataStockIn, $startIndex, $perPage);
    
        $paginator = new Paginator(
            $slicedData,
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );
    
        return view('pages.transaction.stockout')->with([
            "dataStockOut" => $dataStockIn,
            'stockOutPag' => $paginator,
            'currentPage' => $currentPage,
            'perPage' => $perPage,
            'request' => $request,
            'startIndex' => $startIndex,
        ]);
    }

    public function addStock(Request $request)
    {
        return view('pages.transaction.addstock');
    }

    public function outStock(Request $request)
    {
        return view('pages.transaction.outstock');
    }

    public function reportSales(Request $request)
    {
        $reportSales = [
            [
                'id' => 1,
                'code' => 'BA001',
                'date' => '12/10/2023',
                'name' => 'Natadecoco',
                'price' => 15000,
                'stock' => 1,
                'discount' => "30%",
                'total' => "10500",
                'type_sales' => "Offline",
            ],
            [
                'id' => 2,
                'code' => 'BA002',
                'date' => '12/10/2023',
                'name' => 'Mie Instan',
                'price' => 5000,
                'stock' => 2,
                'discount' => "30%",
                'total' => "8500",
                'type_sales' => "Online",
            ],
            
            // Add more dummy data here
        ];

        $perPage = 3; // Jumlah item per halaman

        $currentPage = max(1, $request->query('page', 1));
    
        $startIndex = ($currentPage - 1) * $perPage;
        $slicedData = array_slice($reportSales, $startIndex, $perPage);
    
        $paginator = new Paginator(
            $slicedData,
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );
    
        return view('pages.reports.salesreport')->with([
            "reportSales" => $reportSales,
            'pagiReportSales' => $paginator,
            'currentPage' => $currentPage,
            'perPage' => $perPage,
            'request' => $request,
            'startIndex' => $startIndex,
        ]);
    }

    public function listOnlineSales(Request $request)
    {
        $dataOnlineSales = [
            [
                'id' => 1,
                'invoice' => 'on928302pf',
                'date_order' => '10/12/2023',
                'customer' => 'ridwan',
                'code' => 'BA001',
                'name' => 'Natadecoco',
                'price' => 15000,
                'qyt' => 1,
                'total' => 15000,
                'discount' => "30%",
                'total_price' => "10500",
                'status' => "Belum Diproses",
            ],
            [
                'id' => 2,
                'invoice' => 'on928302pf',
                'date_order' => '10/12/2023',
                'customer' => 'ridwan',
                'code' => 'BA002',
                'name' => 'Mie Instan',
                'price' => 5000,
                'qyt' => 2,
                'total' => 10000,
                'discount' => "10%",
                'total_price' => "9000",
                'status' => "Sudah Diproses",
            ],
            
            // Add more dummy data here
        ];

        $perPage = 3; // Jumlah item per halaman

        $currentPage = max(1, $request->query('page', 1));
    
        $startIndex = ($currentPage - 1) * $perPage;
        $slicedData = array_slice($dataOnlineSales, $startIndex, $perPage);
    
        $paginator = new Paginator(
            $slicedData,
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );
    
        return view('pages.transaction.online_sales')->with([
            "dataOnlineSales" => $dataOnlineSales,
            'pagiOnlineSales' => $paginator,
            'currentPage' => $currentPage,
            'perPage' => $perPage,
            'request' => $request,
            'startIndex' => $startIndex,
        ]);
    }
}
