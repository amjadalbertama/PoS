<?php

namespace App\Http\Controllers\Suppliers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        $suppliers = [
            [
                'id' => 1,
                'name' => 'PT. Pal',
                'phone' => '092828373',
                'address' => 'Jakarta',
                'description' => 'Perusahaan mineral',
            
            ],
            [
                'id' => 2,
                'name' => 'Indofood',
                'phone' => '083938223',
                'address' => 'Bogor',
                'description' => 'Perusahaan mineral',
            
            ],
            [
                'id' => 3,
                'name' => 'PT. Kim',
                'phone' => '083938223',
                'address' => 'Bandung',
                'description' => 'Perusahaan mineral',
            
            ],
            [
                'id' => 4,
                'name' => 'PT. Intan',
                'phone' => '083938223',
                'address' => 'Banten',
                'description' => 'Perusahaan mineral',
            
            ],
            [
                'id' => 5,
                'name' => 'PT. KOMPI',
                'phone' => '083938223',
                'address' => 'bogor',
                'description' => 'Perusahaan mineral',
            
            ],
            [
                'id' => 6,
                'name' => 'PT. Cap Teh',
                'phone' => '083938223',
                'address' => 'Jakarta',
                'description' => 'Perusahaan mineral',
            
            ],
        ];

        $perPage = 3; // Jumlah item per halaman

        $currentPage = max(1, $request->query('page', 1));
    
        $startIndex = ($currentPage - 1) * $perPage;
        $slicedData = array_slice($suppliers, $startIndex, $perPage);
    
        $suppliersview = new Paginator(
            $slicedData,
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );
    
        return view('pages.suppliers.index')->with([
            "suppliers" => $suppliers,
            'suppliersview' => $suppliersview,
            'currentPage' => $currentPage,
            'perPage' => $perPage,
            'request' => $request,
            'startIndex' => $startIndex,
        ]);
    }

    public function addSuppliers(Request $request)
    {
        return view('pages.suppliers.add');
    }
}
