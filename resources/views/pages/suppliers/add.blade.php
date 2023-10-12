@extends('main')

@section('content')
<main id="main" class="main">
    
    <div class="pagetitle">
        <h1>Add Supplier</h1>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="container col-lg-6">
                <div class="card"><br>
                    <div class="card-body col-lg-12 mx-auto">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5><b style="color: #717ff5;">Add New Supplier</b></h5>
                            <a href="{{ url('/suppliers') }}" class="btn btn-secondary">Back</a>
                        </div>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Company Name :</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Company Email :</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone :</label>
                            <input type="number" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address :</label>
                            <textarea class="form-control" id="address" name="address" rows="2" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi :</label>
                            <textarea class="form-control" id="description" name="description" rows="2" required></textarea>
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
