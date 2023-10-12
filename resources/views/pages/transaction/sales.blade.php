@extends('main')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Sales</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row"><!-- Change to row class -->
                    <div class="col-lg-4 mb-3"><!-- Add mb-3 for spacing -->
                        <div class="card">
                            <div class="card-body"><br>
                                <div class="mb-3">
                                    <label for="dateInput" class="form-label">Date :</label>
                                    <input type="date" class="form-control" id="dateInput" placeholder="Enter date">
                                </div>
                                <div class="mb-3">
                                    <label for="casierInput" class="form-label">Casier :</label>
                                    <input type="text" class="form-control" id="casierInput" placeholder="Casier Name" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="casierInput" class="form-label">Customer :</label>
                                    <input type="text" class="form-control" id="casierInput" placeholder="Customer Name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="card">
                            <div class="card-body"><br>
                                <div class="mb-3">
                                    <label for="codeInput" class="form-label">Barcode :</label>
                                    <!-- <input type="text" class="form-control" id="codeInput" placeholder="Enter Code"> -->
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="codeInput" placeholder="Enter Code" data-bs-toggle="modal" data-bs-target="#inputModal">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#inputModal">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="mb-3 ">
                                    <label for="quantityInput" class="form-label">Qty :</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control flex-grow-1" id="quantityInput" placeholder="" style="width: 50%;">
                                        <div class="input-group-append">
                                            <a class="btn btn-primary ml-5" type="button">Add Item</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="card">
                            <div class="card-body"><br>
                                <div class="mb-3">
                                    <label for="invoiceInput" class="form-label">Invoice :</label>
                                    <input type="text" class="form-control" id="invoiceInput" placeholder="" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="totalPriceInput" class="form-label">Total Price :</label>
                                    <input type="number" class="form-control" id="totalPriceInput" placeholder="" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title" style="color: #717ff5;">List Items</h5>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="">No</th>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Harga</th>
                                                <th>Qyt</th>
                                                <th>Discount</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dataSales as $sales)
                                            <tr>
                                                <td>{{ $sales['id'] }}</td>
                                                <td>{{ $sales['code'] }}</td>
                                                <td>{{ $sales['name'] }}</td>
                                                <td>{{ $sales['price'] }}</td>
                                                <td>{{ $sales['stock'] }}</td>
                                                <td>{{ $sales['discount'] }}</td>
                                                <td>{{ $sales['total'] }}</td>
                                                <td>
                                                    <button class="btn btn-info btn-action" data-bs-toggle="modal" data-bs-target="#editItemSales">Edit</button>
                                                    <button class="btn btn-danger btn-action" onclick="deleteRow(this)">Delete</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title" style="color: #717ff5;">Payment</h5>
                                <div class="mb-3">
                                    <label for="invoiceInput" class="form-label">Cash :</label>
                                    <input type="number" class="form-control" id="invoiceInput" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="totalPriceInput" class="form-label">Note:</label>
                                    <textarea class="form-control" id="totalPriceInput" placeholder="" rows="2"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 align-items-center">
                        <div class="d-flex justify-content-end">
                            <a href="" type="button" class="btn btn-success btn-lg">Payment Process</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<!-- Modals Item Product-->
<div class="modal fade" id="inputModal" tabindex="-1" aria-labelledby="inputModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"> <!-- Perbesar ukuran modal dengan kelas modal-lg -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="inputModalLabel">Choose Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <div class="input-group"> <!-- Gunakan input-group untuk ikon pencarian -->
            <input type="text" class="form-control" id="searchInput" placeholder="Cari...">
            <span class="input-group-text">
              <i class="bi bi-search"></i> <!-- Gunakan ikon pencarian dari Bootstrap Icons -->
            </span>
          </div>
        </div>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Barcode</th>
              <th>Item Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>BM001</td>
              <td>Mie Instan</td>
              <td>
                <a href="#" class="btn btn-primary">Add Item</a>
              </td>
            </tr>
            <tr>
              <td>BM002</td>
              <td>Minuman</td>
              <td>
                <a href="#" class="btn btn-primary">Add Item</a>
              </td>
            </tr>
            <!-- Tambahkan baris data lain sesuai kebutuhan -->
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Simpan</button> -->
      </div>
    </div>
  </div>
</div>

<!-- Modals Edit Item Product -->
<div class="modal fade" id="editItemSales" tabindex="-1" aria-labelledby="inputModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="inputModalLabel">Edit Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="code" class="form-label">Code</label>
            <input type="text" class="form-control" id="code" placeholder="" disabled>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="email" class="form-control" id="name" placeholder="" disabled>
          </div>
          <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" placeholder="" disabled>
          </div>
          <div class="mb-3">
            <label for="quantity" class="form-label">Qyt</label>
            <input type="number" class="form-control" id="quantity" placeholder="">
          </div>
          <div class="mb-3">
            <label for="discount" class="form-label">Discount</label>
            <input type="number" step="0.00" class="form-control" id="discount" placeholder="">
          </div>
          <div class="mb-3">
            <label for="totalPriceItem" class="form-label">Total Price / Item</label>
            <input type="number" step="0.00" class="form-control" id="totalPriceItem" placeholder="" disabled>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
@endsection
