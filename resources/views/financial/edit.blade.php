@extends('layouts.master')
@php
    $titles = 'QC - List of Material';
    $title = 'Edit Financial ';
    $pretitle = 'EXPENSE-Q-LIS';
    $pages = $title;
@endphp
@section('title', $pages)
@section('content')
    <div class="row">
        <div class="col">
            @if ($financial->Type_of_Budget === 'Maintenance')
                <a class="btn btn-primary" href="{{ route('Maintenance') }}"> Back </a>
            @elseif ($financial->Type_of_Budget === 'Product Research and Development')
                <a class="btn btn-primary" href="{{ route('Product') }}"> Back</a>
            @elseif ($financial->Type_of_Budget === 'Supporting Material')
                <a class="btn btn-primary" href="{{ route('Supporting') }}"> Back </a>
            @elseif ($financial->Type_of_Budget === 'Manufacturing Supply')
                <a class="btn btn-primary" href="{{ route('Manufacturing') }}"> Back </a>
            @else
                <a class="btn btn-primary" href="{{ route('Dashboards') }}"> Back</a>
            @endif

        </div>
    </div>
    <div class="mx-2 mt-2">
        <h4 class="mb-2">Adjust Budget</h4>
    </div>

    <div class="card ">
        <div class="card-body ">
            <form action="{{ route('financial.update', $financial->id) }}" method="post">

                @csrf
                @method('PUT')

                {{-- <label class="form-label">Jumlah Stok : {{ $financial->Quantity }} </label> --}}
                <br>
                <div class="  mb-3">
                    <label class="form-label">Month and Year</label>
                    <input type="text" name="bulan_tahun" class="form-control" readonly placeholder="Input"
                        value="{{ $financial->bulan_tahun }}">
                </div>


                <div class="  mb-3">
                    <label class="form-label">actual</label>
                    <input type="text" name="actual" class="form-control bg-secondary text-white" readonly name="example-text-input"
                        placeholder="0" value="{{ $financial->actual }}">
                </div>

                <div class="mb-3">
                    <label for="budget" class="form-label">Budget IDR</label>
                    <input type="number" class="form-control" id="budget" name="budget" min="0"
                        placeholder="0" value="{{ $financial->budget }}">
                </div>

                <div class="  mb-3">
                    <label class="form-label">Information</label>
                    <input type="text" name="Keterangan" class="form-control" name="example-text-input"
                        placeholder="Input" value="{{ $financial->Keterangan }}">
                </div>


                <div class="mb-3">
                    <input type="submit" value="Save" class="btn btn-primary">
                </div>

            </form>

        </div>
    </div>


@stop
