@extends('main')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Distribution In</h1>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="container col-lg-6">
                <div class="card"><br>
                    <div class="card-body col-lg-12 mx-auto">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5><b style="color: #717ff5;">Add Distribution In</b></h5>
                            <a href="{{ url('/suppliers') }}" class="btn btn-secondary">Back</a>
                        </div>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="Id Distribution" class="form-label">Id Transaction :</label>
                            <input type="text" class="form-control" id="id_dist_in" name="id_dist_in" required disabled>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date :</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                        <div class="mb-3">
                            <label for="branch_origin" class="form-label">Origin Branch :</label>
                            <select class="form-select" id="branch" name="branch" required>
                                <option value="branch1">branch 1</option>
                                <option value="branch2">branch 2</option>
                                <option value="branch3">branch 3</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="code" class="form-label">Barcode:</label>
                            <input type="text" class="form-control" id="code" name="code" data-bs-toggle="modal" data-bs-target="#selectCodeItemDistIn" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Item Name :</label>
                            <input type="text" class="form-control" id="name" name="name" required disabled>
                        </div>
                        <div class="mb-3">
                            <label for="unit" class="form-label">Pack :</label>
                            <input type="text" class="form-control" id="unit" name="unit" required disabled>
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Qyt :</label>
                            <input type="number" class="form-control" id="amount" name="amount" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

<!-- Modals Code Item -->
<div class="modal fade" id="selectCodeItemDistIn" tabindex="-1" aria-labelledby="inputModalLabel" aria-hidden="true">
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
              <th>Name Item</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>BM001</td>
              <td>Mie Instan</td>
              <td>
                <a href="#" class="btn btn-primary">add Item</a>
              </td>
            </tr>
            <tr>
              <td>BM002</td>
              <td>Minuman</td>
              <td>
                <a href="#" class="btn btn-primary">add Item</a>
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
@endsection
