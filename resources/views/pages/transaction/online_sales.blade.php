@extends('main')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Online Sales</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row"><!-- Change to row class -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title" style="color: #717ff5;">Data Online Sales</h5>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="">No</th>
                                                <th>Invoice</th>
                                                <th>Customer</th>
                                                <th>Date Order</th>
                                                <th>Id Purchase Order</th>
                                                <!-- <th>Nama barang</th>
                                                <th>Harga Satuan</th>
                                                <th>Qyt</th>
                                                <th>Total</th>
                                                <th>Diskon</th>
                                                <th>Total Harga</th> -->
                                                <th>Status</th>
                                                <th>Proses</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pagiOnlineSales as $sales)
                                            <tr>
                                                <td>{{ $sales['id'] }}</td>
                                                <td>{{ $sales['invoice'] }}</td>
                                                <td>{{ $sales['customer'] }}</td>
                                                <td>{{ $sales['date_order'] }}</td>
                                                <td>08on293</td>
                                                <!-- <td>{{ $sales['code'] }}</td>
                                                <td>{{ $sales['name'] }}</td>
                                                <td>{{ $sales['price'] }}</td>
                                                <td>{{ $sales['qyt'] }}</td>
                                                <td>{{ $sales['total'] }}</td>
                                                <td>{{ $sales['discount'] }}</td>
                                                <td>{{ $sales['total_price'] }}</td> -->
                                                <td>{{ $sales['status'] }}</td>
                                                <td>
                                                    <button class="btn btn-primary btn-action" data-bs-toggle="modal" data-bs-target="#prosesOnlinePayment">Process</button>
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

                                            @for ($i = 1; $i <= ceil(count($dataOnlineSales) / $perPage); $i++)
                                            <li class="page-item {{ $i === $currentPage ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $request->url() }}?page={{ $i }}">{{ $i }}</a>
                                            </li>
                                            @endfor

                                            @if ($currentPage < ceil(count($dataOnlineSales) / $perPage))
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
<div class="modal fade" id="prosesOnlinePayment" tabindex="-1" aria-labelledby="inputModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="inputModalLabel"><b>Detail Order</b></h5>
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
                        <td><b>Date</b></td>
                        <td>:</td>
                        <td>12/10/2023</td>
                    </tr>
                    <tr>
                        <td><b>Proce</b></td>
                        <td>:</td>
                        <td>
                        15.000
                        </td>
                    </tr>
                    <tr>
                        <td><b>Discount</b></td>
                        <td>:</td>
                        <td>
                        10 %
                        </td>
                    </tr>
                    <tr>
                        <td><b>Total Price</b></td>
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
                        <td><b>Casier</b></td>
                        <td>:</td>
                        <td>Munawar</td>
                    </tr>
                    <tr>
                        <td><b>Customer</b></td>
                        <td>:</td>
                        <td>Ridwan</td>
                    </tr>
                    <tr>
                        <td><b>Cash</b></td>
                        <td>:</td>
                        <td>20.000</td>
                    </tr>
                    <tr>
                        <td><b>Note</b></td>
                        <td>:</td>
                        <td>Pembayaran Transaksi Online</td>
                    </tr>
                </table>
            </div>
          </div><br>
          <h6>List Item Order :</h6>
          <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Barcode</th>
              <th>Item Name</th>
              <th>Qyt</th>
              <th>Price / Item</th>
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
            <!-- Tambahkan baris data lain sesuai kebutuhan -->
          </tbody>
        </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Payment Process</button>
      </div>
    </div>
  </div>
</div>

@endsection
