@extends('main')

@section('content')
<main id="main" class="main">
    
    <div class="pagetitle">
        <h1>Tambah Pegawai</h1>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="container col-lg-12">
                <div class="card"><br>
                    <div class="card-body col-lg-6 mx-auto">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5><b style="color: #717ff5;">Tambah Pegawai Baru</b></h5>
                            <a href="{{ url('/users') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama :</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email :</label>
                                <input type="text" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">No. Hp :</label>
                                <input type="number" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat :</label>
                                <textarea class="form-control" id="address" name="address" rows="2" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Jabatan:</label>
                                <select class="form-select" id="role" name="role" required>
                                    <option value="role1">role 1</option>
                                    <option value="role2">role 2</option>
                                    <option value="role3">role 3</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

@endsection
