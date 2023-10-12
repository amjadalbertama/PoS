@extends('main')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Distribution In</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="container col-lg-12">
                <div class="card">
                        <div class="card-body"><br>
                        <h5><b>Data Distribution In</b></h5>
                            <div class="row align-items-center justify-content-between mb-3">
                                <div class="col-md-4 mb-3 mb-md-0">
                                    <div class="input-group search-input">
                                        <input type="text" class="form-control" placeholder="Cari...">
                                    </div>
                                </div>
                                <div class="col-md-4 text-md-right">
                                    <a class="btn btn-primary tambah-btn" href="{{ url('/formadd/distributin') }}">Add Distribution In</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="">No</th>
                                            <th>Id Transaction</th>
                                            <th>Item Name</th>
                                            <th>Date</th>
                                            <th>User</th>
                                            <th>Origin Branch</th>
                                            <th>Status</th>
                                            <!-- <th>Satuan</th>
                                            <th>Jumlah</th> -->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataDisIn as $disIn)
                                        <tr>
                                            <td>{{ $disIn['id'] }}</td>
                                            <td>iP029383kc</td>
                                            <!-- <td>{{ $disIn['code'] }}</td> -->
                                            <td>{{ $disIn['name'] }}</td>
                                            <td>{{ $disIn['date'] }}</td>
                                           
                                            <td>Yudi-Staff</td>
                                            <td>{{ $disIn['branch_ori'] }}</td>
                                            <!-- <td>{{ $disIn['address_ori'] }}</td> -->
                                            <!-- <td>{{ $disIn['unit'] }}</td>
                                            <td>{{ $disIn['stock'] }}</td> -->
                                            <td>waiting for approval</td>
                                            <td>
                                                <button class="btn btn-info btn-action" onclick="editRow(this)">Edit</button>
                                                <button class="btn btn-danger btn-action" onclick="deleteRow(this)">Delete</button>
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

                                        @for ($i = 1; $i <= ceil(count($pagiDistriIn) / $perPage); $i++)
                                        <li class="page-item {{ $i === $currentPage ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $request->url() }}?page={{ $i }}">{{ $i }}</a>
                                        </li>
                                        @endfor

                                        @if ($currentPage < ceil(count($pagiDistriIn) / $perPage))
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
    </section>
</main><!-- End #main -->

@endsection
