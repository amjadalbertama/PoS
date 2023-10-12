@extends('main')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add Pack</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="container col-lg-6">
                <div class="card" ><br>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5><b style="color: #717ff5;">Add New Pack</b></h5>
                            <a href="{{ url('/datamaster') }}" class="btn btn-secondary">Back</a>
                        </div>
                        <form action="" method="post">
                            <!-- <div class="mb-3">
                                <label for="code" class="form-label">Kode Satuan :</label>
                                <input type="text" class="form-control" id="code" name="code" required>
                            </div> -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Pack Name :</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="pack_qyt" class="form-label">Qyt/pack:</label>
                                <input type="number" class="form-control" id="pack_qyt" name="pack_qyt" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

@endsection
