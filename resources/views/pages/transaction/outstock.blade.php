@extends('main')

@section('content')
<main id="main" class="main">
    
    <div class="pagetitle">
        <h1>Stock Out</h1>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="container col-lg-5">
                <div class="card"><br>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5><b style="color: #717ff5;">Add Stock Out</b></h5>
                            <a href="{{ url('/stockout') }}" class="btn btn-secondary">Back</a>
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
                                <label for="code" class="form-label">Barcode:</label>
                                <input type="text" class="form-control" id="code" name="code" required>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Item Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required disabled>
                            </div>
                            <div class="mb-3">
                                <label for="unit" class="form-label">Pack:</label>
                                <input type="text" class="form-control" id="unit" name="unit" required disabled>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description :</label>
                                <textarea class="form-control" id="description" name="description" rows="2" required></textarea>
                            </div>
                            <!-- <div class="mb-3">
                                <label for="supplier" class="form-label">Supplier:</label>
                                <select class="form-select" id="supplier" name="supplier" required>
                                    <option value="supplier1">supplier 1</option>
                                    <option value="supplier2">supplier 2</option>
                                    <option value="supplier3">supplier 3</option>
                                </select>
                            </div> -->
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Qyt:</label>
                                <input type="number" step="0.01" class="form-control" id="quantity" name="quantity" required>
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
