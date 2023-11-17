@extends('layouts.master')
@php
    $titles = 'Q-LIS - List of Material';
    $title = 'Q-LIS | Financial | Supporting Material';
    $pretitle = 'EXPENSE-Q-LIS';
    $pages = $title;
@endphp
@section('title', $pages)
@section('content')
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="{{ route('Dashboards') }}"> Back</a>
        </div>
    </div>
    <div class="mx-2 mt-2">
        <h4 class="mb-2">Financial - Supporting Material</h4>
    </div>

    <div class="container">
        <form method="GET" action="" class="row align-items-end">
            <div class="col-md-3">
                <label for="bulan_tahun">Year</label>
                <select class="form-select" name="bulan_tahun">
                    <option value="">Select</option>
                    @for ($year = date('Y'); $year >= 2023; $year--)
                        <option value="{{ substr($year, -2) }}" {{ $filterYear === substr($year, -2) ? 'selected' : '' }}>
                            {{ $year }}
                        </option>
                    @endfor
                </select>
            </div>
            <div class="col-md-1 pt-4">
                <button type="submit" class="btn btn-success">Filter</button>
            </div>
        </form>
    </div>
    <br>

    <div class="col-12">
        <div class="card">
            <div class="table-responsive table-bordered">
                <table class="table card-table table-vcenter table-bordered text-nowrap datatable">
                    <thead>
                        <thead>
                            <?php $no = 1; ?>
                            <tr>
                                <th class="text-center">No</th>
                                @foreach ($financial as $financials)
                                    <th class="text-center">{{ $financials->bulan_tahun }}</th>
                                @endforeach
                            </tr>
                        </thead>
                    <tbody>
                        <tr>
                            <th>Budget</th>
                            @foreach ($financial as $financials)
                                <td class="text-center">{{ number_format($financials->budget, 2, '.', ',') }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <th>Actual</th>
                            @foreach ($financial as $financials)
                                <td class="text-center ">{{ number_format($financials->actual, 2, '.', ',') }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <th>Review</th>
                            @foreach ($financial as $financials)
                                <td
                                    class="text-center {{ $financials->actual > $financials->budget ? 'bg-danger text-white' : 'bg-success text-white' }}">
                                    {{ number_format($financials->budget - $financials->actual, 2, '.', ',') }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <th>Information</th>
                            @foreach ($financial as $financials)
                                <td class="text-center"> {{ $financials->Keterangan }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <th>Action</th>
                            @foreach ($financial as $financials)
                                <td class="text-center"> <a class="btn btn-primary btn-sm"
                                        href="{{ route('financial.edit', $financials->id) }}">Edit Budget</a></td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>

                </table>
            </div>

        </div>
    </div>
    <br>
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom border-danger">
    </div>
    <br>

    @include('financial.audit')
@stop
@push('js')
    <script type="text/javascript">
        $(function() {
            var table = $('#listlowss,#listupcoming').DataTable({

            });
        });
    </script>
@endpush
