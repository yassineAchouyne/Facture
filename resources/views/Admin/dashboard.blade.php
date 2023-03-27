@extends('layouts.index')

@section('load')
    onload="fetch_facture_data('')"
@endsection

@section('content')

<div class="container-fluid" id="load">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!--  Nombre de Client Card  -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Nombre des Clients</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $nbrClient }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-person-fill fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Nombre de Facture Card  -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Nombre des Factures </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$nbrFacture}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-clipboard-check-fill fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chiffre d'affaires Card  -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Chiffre d'affaires </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total}} DH</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-cash fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--  Card = -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total CHIFFRE D'AFFAIRES</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$tva}} DH</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-cash-coin fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Les Factures <span id="nom_records"></span> (<span id="total_records"></span>) </h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <label class="dropdown-item">
                                <input style="display: none;" id="search" name="search" type="radio" value="payer" /> Payer
                            </label>
                            <label class="dropdown-item">
                                <input style="display: none;" id="search" name="search" type="radio" value="nonpayer" /> Non Payer
                            </label>
                            <label class="dropdown-item">
                                <input style="display: none;" id="search" name="search" type="radio" value="perimes" /> perimes
                            </label>
                            <a href="/factures" class="dropdown-item">
                                touts
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive" style="height: 323px;">
                        <table class="table table-hover">
                            <tbody></tbody>
                        </table>
                        <span id="page_records"></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Les Factures</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle" style="color:#eb8258;"></i> Non Payer
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle" style="color:#3b9086;"></i> Payer
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; {{date('Y')}} - Factura.ma</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->
<input type="hidden" id="Fpayer" value="{{$Fpayer}}"/>
<input type="hidden" id="Fnonpayer" value="{{$Fnonpayer}}"/>
@endsection

@section('chart')
<script>
    $(document).ready(function() {

        fetch_facture_data();

        function fetch_facture_data(query = '') {
            // alert('ok')
            $.ajax({
                url: "{{ route('action') }}",
                method: 'GET',
                data: {
                    query: query
                },
                dataType: 'json',
                success: function(data) {
                    $('tbody').html(data.table_data);
                    $('#total_records').text(data.total_data);
                    $('#nom_records').text(data.nom_data);
                }
            })
        }

        $(document).on('change', '#search', function() {
            var query = $(this).val();
            fetch_facture_data(query);
        });
    });
</script>
<script>
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    // Pie Chart Example
    var Fpayer = document.getElementById('Fpayer').value
    var Fnonpayer =  document.getElementById('Fnonpayer').value
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Payer", "Non Payer"],
            datasets: [{
                data: [
                    Fpayer, Fnonpayer
                ],
                backgroundColor: ['#3b9086', '#eb8258'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });
</script>
@endsection