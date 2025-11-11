@extends('admin.layouts.master')

@section('content')
    <div class="container">

        <div class="row my-3 justify-content-around">
            <div class="col-sm-6 col-md-3 d-flex justify-content-around align-items-center">
                <div class="card card-stats card-round shadow-sm w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-around">
                            <button class="btn btn-primary btn-square mr-3">
                                <i class="fas fa-users"></i>
                            </button>
                            <div class="flex-grow-1 text-center">
                                <p class="card-category text-dark fw-bold mb-1">Admin</p>
                                <h5 class="card-tile text-dark mb-0">1,294</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 d-flex justify-content-around align-items-center">
                <div class="card card-stats card-round shadow-sm w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-around">
                            <button class="btn btn-info btn-square mr-3">
                                <i class="fas fa-user-check"></i>
                            </button>
                            <div class="flex-grow-1 text-center">
                                <p class="card-category text-dark fw-bold mb-1">Users</p>
                                <h5 class="card-tile text-dark mb-0">1,303</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 d-flex justify-content-around align-items-center">
                <div class="card card-stats card-round shadow-sm w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-around">
                            <button class="btn btn-success btn-square mr-3">
                                <i class="fa-solid fa-book"></i>
                            </button>
                            <div class="flex-grow-1 text-center">
                                <p class="card-category text-dark fw-bold mb-1">Books</p>
                                <h5 class="card-tile text-dark mb-0">$ 1,345</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 d-flex justify-content-around align-items-center">
                <div class="card card-stats card-round shadow-sm w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-around">
                            <button class="btn btn-secondary btn-square mr-3">
                                <i class="fa-solid fa-table-list"></i>
                            </button>
                            <div class="flex-grow-1 text-center">
                                <p class="card-category text-dark fw-bold mb-1">Book Collections</p>
                                <h5 class="card-tile text-dark mb-0">576</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row my-3">

            <div class="col-sm-6 col-md-3 d-flex justify-content-around align-items-center">
                <div class="card card-stats card-round shadow-sm w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-around">
                            <button class="btn btn-danger btn-square mr-3">
                                <i class="fa-brands fa-readme"></i>
                            </button>
                            <div class="flex-grow-1 text-center">
                                <p class="card-category text-dark fw-bold mb-1">Read Count</p>
                                <h5 class="card-tile text-dark mb-0">576</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 d-flex justify-content-around align-items-center">
                <div class="card card-stats card-round shadow-sm w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-around">
                            <button class="btn btn-warning btn-square mr-3">
                                <i class="fa-solid fa-file-arrow-down"></i>
                            </button>
                            <div class="flex-grow-1 text-center">
                                <p class="card-category text-dark fw-bold mb-1">Download Count</p>
                                <h5 class="card-tile text-dark mb-0">$ 1,345</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script>
        console.log('Hello World');
    </script>
@endsection
