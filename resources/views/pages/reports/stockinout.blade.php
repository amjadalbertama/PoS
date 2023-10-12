@extends('main')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Barang Masuk dan Keluar</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row"><!-- Change to row class -->
                    <div class="col-lg-12 mb-3"><!-- Add mb-3 for spacing -->
                        <div class="card">
                            <div class="card-body"><br>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="invoiceInput" class="form-label">Nomor Invoice/Transaksi:</label>
                                        <input type="text" class="form-control" id="invoiceInput" placeholder="Enter invoice number">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="startDateInput" class="form-label">Tanggal Awal:</label>
                                        <input type="date" class="form-control" id="startDateInput" placeholder="Enter start date">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="endDateInput" class="form-label">Tanggal Akhir:</label>
                                        <input type="date" class="form-control" id="endDateInput" placeholder="Enter end date">
                                    </div>
                                    <div class="form-group col-md-12 text-right">
                                        <button type="button" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title" style="color: #717ff5;">Data Penjualan</h5>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="">No</th>
                                                <th>Invoice</th>
                                                <th>Tanggal</th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah</th>
                                                <th>Asal Cabang</th>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pagiReportSales as $sales)
                                            <tr>
                                                <td>{{ $sales['id'] }}</td>
                                                <td>{{ $sales['code'] }}</td>
                                                <td>{{ $sales['date'] }}</td>
                                                <td>{{ $sales['price'] }}</td>
                                                <td>{{ $sales['discount'] }}</td>
                                                <td>{{ $sales['total'] }}</td>
                                                <td>
                                                <button class="btn btn-primary btn-action" data-bs-toggle="modal" data-bs-target="#detailItemSales">Detail</button>
                                                    <button class="btn btn-info btn-action" data-bs-toggle="modal" data-bs-target="#editItemSales">Cetak</button>
                                                    <button class="btn btn-danger btn-action" onclick="deleteRow(this)">Hapus</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination">
                                            @if ($currentPage > 1)
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $request->url() }}?page={{ $currentPage - 1 }}" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            @endif

                                            @for ($i = 1; $i <= ceil(count($reportSales) / $perPage); $i++)
                                            <li class="page-item {{ $i === $currentPage ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $request->url() }}?page={{ $i }}">{{ $i }}</a>
                                            </li>
                                            @endfor

                                            @if ($currentPage < ceil(count($reportSales) / $perPage))
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $request->url() }}?page={{ $currentPage + 1 }}" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                            @endif
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

<!-- Modals Edit Item Product -->
<div class="modal fade" id="detailItemSales" tabindex="-1" aria-labelledby="inputModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="inputModalLabel"><b>Details</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <!-- Tabel Pertama (Sebelah Kiri) -->
                <table>
                    <tr>
                        <td><b>Invoice</b></td>
                        <td>:</td>
                        <td>Ip02929381</td>
                    </tr>
                    <tr>
                        <td><b>Tanggal</b></td>
                        <td>:</td>
                        <td>12/10/2023</td>
                    </tr>
                    <tr>
                        <td><b>Harga</b></td>
                        <td>:</td>
                        <td>
                        15.000
                        </td>
                    </tr>
                    <tr>
                        <td><b>Diskon</b></td>
                        <td>:</td>
                        <td>
                        10 %
                        </td>
                    </tr>
                    <tr>
                        <td><b>Total Harga</b></td>
                        <td>:</td>
                        <td>
                        13.500
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
              <!-- Tabel Kedua (Sebelah Kanan) -->
                <table>
                    <tr>
                        <td><b>Kasir</b></td>
                        <td>:</td>
                        <td>Munawar</td>
                    </tr>
                    <tr>
                        <td><b>Cash</b></td>
                        <td>:</td>
                        <td>20.000</td>
                    </tr>
                    <tr>
                        <td><b>Note</b></td>
                        <td>:</td>
                        <td>Pembayaran Uang Kertas</td>
                    </tr>
                </table>
            </div>
          </div><br>
          <h6>Daftar Barang Pembelian :</h6>
          <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Kode</th>
              <th>Nama Barang</th>
              <th>Qyt</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>BM001</td>
              <td>Mie Instan</td>
              <td>1</td>
              <td>
                7.500
              </td>
            </tr>
            <tr>
              <td>BM002</td>
              <td>Minuman</td>
              <td>1</td>
              <td>
                7.500
              </td>
            </tr>
            <!-- Tambahkan baris data lain sesuai kebutuhan -->
          </tbody>
        </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

@endsection
