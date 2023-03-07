@extends("layouts.index")

@section('style')
<style>
    .email_link{
        text-decoration: none;
    }
    .email_link:hover{
        color:  #6c757d;
        text-decoration: underline;
    }
</style>
@endsection
@section('content')

<div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Nom</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Dropdown Header:</div>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-pie pt-4 pb-2">
                <i class="bi bi-envelope text-primary mr-3 fs-4"></i>
                <a href="mailto:" class="fs-4 email_link"">test</a>
            </div>
            <div class="chart-pie pt-4 pb-2">
                <i class="bi bi-phone text-primary mr-3 fs-4"></i>
                <a href="mailto:" class="fs-4 email_link""></a>
            </div>
        </div>
    </div>
</div>
@endsection