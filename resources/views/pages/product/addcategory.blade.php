@extends('main')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add Category</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="container col-lg-6"> <!-- Mengganti col-lg-12 menjadi col-lg-8 -->
                <div class="card"><br>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5><b style="color: #717ff5;">Add New Category</b></h5>
                            <a href="{{ url('/datamaster') }}" class="btn btn-secondary">Back</a>
                        </div>
                        <form action="" method="post"><br>
                            <!-- <div class="mb-3">
                                <label for="code" class="form-label">Kode Kategori :</label>
                                <input type="text" class="form-control" id="code" name="code" required>
                            </div> -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Category Name :</label>
                                <input type="text" class="form-control" id="name" name="name" required>
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
