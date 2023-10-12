@extends('main')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add Item</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="container col-lg-8">
                <div class="card">
                    <div class="card-body"><br>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5><b style="color: #717ff5;">Add New Item</b></h5>
                            <a href="{{ url('/datamaster') }}" class="btn btn-secondary">Back</a>
                        </div>
                    <form action="" method="post"><br>
                        <div class="mb-3">
                            <label for="name" class="form-label">Barcode :</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Item Name :</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category:</label>
                            <select class="form-select" id="category" name="category" required>
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                                <!-- Tambahkan opsi lain sesuai kebutuhan -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="unit" class="form-label">Pack:</label>
                            <select class="form-select" id="unit" name="unit" required>
                                <option value="unit1">Pack 1</option>
                                <option value="unit2">Pack 2</option>
                                <option value="unit3">Pack 3</option>
                                <!-- Tambahkan opsi lain sesuai kebutuhan -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="unit" class="form-label">Supplier:</label>
                            <select class="form-select" id="unit" name="unit" required>
                                <option value="unit1">Supplier 1</option>
                                <option value="unit2">Supplier 2</option>
                                <option value="unit3">Supplier 3</option>
                                <!-- Tambahkan opsi lain sesuai kebutuhan -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Default Price:</label>
                            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">tax:</label>
                            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price:</label>
                            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
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
