@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category">Fraud Detection Systems</h5>
                            <h2 class="card-title">Performance</h2>
                        </div>
                        <div class="col-sm-6">
                            <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                            <label class="btn btn-sm btn-primary btn-simple active" id="0">
                                <input type="radio" name="options" checked>
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">High</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-single-02"></i>
                                </span>
                            </label>
                            <label class="btn btn-sm btn-primary btn-simple" id="1">
                                <input type="radio" class="d-none d-sm-none" name="options">
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Medium</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-gift-2"></i>
                                </span>
                            </label>
                            <label class="btn btn-sm btn-primary btn-simple" id="2">
                                <input type="radio" class="d-none" name="options">
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Low</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-tap-02"></i>
                                </span>
                            </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartBig1"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Banyak Transaksi Fraud</h5>
                    <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> 763,215</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartLinePurple"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Persentase Fraud</h5>
                    <h3 class="card-title"><i class="tim-icons icon-delivery-fast text-info"></i> 3,500</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="CountryChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Rata-rata Transaksi</h5>
                    <h3 class="card-title"><i class="tim-icons icon-send text-success"></i> 12,100K</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartLineGreen"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-12">
            <canvas id="doughnutChart" width="50" height="50"></canvas>
        </div>
        <div class="col-lg-8 col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Fraud Transactions Detected</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter" id="dataTable">
                            <thead class="text-primary">
                                <tr>
                                    <th class="text-center">income</th>
                                    <th class="text-center">predict_fraud_proba</th>
                                    <th class="text-center">name_email_similarity</th>
                                    <th class="text-center">prev_address_months_count</th>
                                    <th class="text-center">current_address_months_count</th>
                                    <th class="text-center">customer_age</th>
                                    <th class="text-center">days_since_request</th>
                                    <th class="text-center">intended_balcon_amount</th>
                                    <th class="text-center">zip_count_4w</th>
                                    <th class="text-center">velocity_6h</th>
                                    <th class="text-center">velocity_24h</th>
                                    <th class="text-center">velocity_4w</th>
                                    <th class="text-center">bank_branch_count_8w</th>
                                    <th class="text-center">date_of_birth_distinct_emails_4w</th>
                                    <th class="text-center">credit_risk_score</th>
                                    <th class="text-center">email_is_free</th>
                                    <th class="text-center">phone_home_valid</th>
                                    <th class="text-center">phone_mobile_valid</th>
                                    <th class="text-center">bank_months_count</th>
                                    <th class="text-center">has_other_cards</th>
                                    <th class="text-center">proposed_credit_limit</th>
                                    <th class="text-center">foreign_request</th>
                                    <th class="text-center">session_length_in_minutes</th>
                                    <th class="text-center">keep_alive_session</th>
                                    <th class="text-center">device_distinct_emails_8w</th>
                                    <th class="text-center">device_fraud_count</th>
                                    <th class="text-center">month</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($fraudData as $data)
                                    <tr>
                                        <td class="text-center">{{ $data->income }}</td>
                                        <td class="text-center">{{ $data->predict_fraud_proba }}</td>
                                        <td class="text-center">{{ $data->name_email_similarity }}</td>
                                        <td class="text-center">{{ $data->prev_address_months_count }}</td>
                                        <td class="text-center">{{ $data->current_address_months_count }}</td>
                                        <td class="text-center">{{ $data->customer_age }}</td>
                                        <td class="text-center">{{ $data->days_since_request }}</td>
                                        <td class="text-center">{{ $data->intended_balcon_amount }}</td>
                                        <td class="text-center">{{ $data->zip_count_4w }}</td>
                                        <td class="text-center">{{ $data->velocity_6h }}</td>
                                        <td class="text-center">{{ $data->velocity_24h }}</td>
                                        <td class="text-center">{{ $data->velocity_4w }}</td>
                                        <td class="text-center">{{ $data->bank_branch_count_8w }}</td>
                                        <td class="text-center">{{ $data->date_of_birth_distinct_emails_4w }}</td>
                                        <td class="text-center">{{ $data->credit_risk_score }}</td>
                                        <td class="text-center">{{ $data->email_is_free }}</td>
                                        <td class="text-center">{{ $data->phone_home_valid }}</td>
                                        <td class="text-center">{{ $data->phone_mobile_valid }}</td>
                                        <td class="text-center">{{ $data->bank_months_count }}</td>
                                        <td class="text-center">{{ $data->has_other_cards }}</td>
                                        <td class="text-center">{{ $data->proposed_credit_limit }}</td>
                                        <td class="text-center">{{ $data->foreign_request }}</td>
                                        <td class="text-center">{{ $data->session_length_in_minutes }}</td>
                                        <td class="text-center">{{ $data->keep_alive_session }}</td>
                                        <td class="text-center">{{ $data->device_distinct_emails_8w }}</td>
                                        <td class="text-center">{{ $data->device_fraud_count }}</td>
                                        <td class="text-center">{{ $data->month }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('white') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('doughnutChart').getContext('2d');

            var data = {
                labels: ['Fraud', 'Not Fraud', 'Like Fraud'],
                datasets: [{
                    data: [30, 50, 20], 
                    backgroundColor: ['#D048B6', '#78BBF7', '#00D6B4'],
                }],
            };

            var options = {
                cutout: '70%',
            };

            var doughnutChart = new Chart(ctx, {
                type: 'doughnut',
                data: data,
                options: options,
            });
        });
    </script>

@endpush
