@extends('layouts.master')
@php
    $titles = 'QC - LIST INSTRUMENT/ ASSET QUALITY CONTROL DEPARTMENT';
    $title = 'Q-LIS | LIST INSTRUMENT ';
    $pretitle = 'Calibration  Q-LIS';
    $pages = $title;
@endphp
@section('title', $pages)
@section('content')






    <div class="col-12">
        <div class="card">



            <div class="table-responsive ">
                <table class="table table-bordered text-nowrap table-responsive-sm" id="listlowss">
                    <thead>
                        <tr>
                            <?php $no = 1; ?>
                            <th class="w-1 ml-1" style="background-color: lightgray;">Action
                            </th>
                            <th style="background-color: lightgray;">No.</th>
                            <th style="background-color: lightgray;">Instrument Name</th>
                            <th style="background-color: lightgray;">Instrument ID</th>
                            <th style="background-color: lightgray;">Serial number</th>
                            <th style="background-color: lightgray;">Calibration Frequency</th>
                            <th style="background-color: lightgray;">Need Calibration</th>
                            <th style="background-color: lightgray;">Last Calibration</th>
                            <th style="background-color: lightgray;">Next Calibration</th>
                            <th style="background-color: lightgray;">Calibration By</th>
                            <th style="background-color: lightgray;">Year of Investment</th>
                            <th style="background-color: lightgray;">Location</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kalibrasi as $kalibrasis)
                            <tr>
                                <td class="text-end">

                                    <a href="{{ route('Barang.show', $kalibrasis->id) }}"title="Info Detail Material"
                                        class="btn btn-info btn-sm"><i class="fa fa-info"></i></a>

                                    <a href="{{ route('Barang.edit', $kalibrasis->id) }}" class="btn btn-primary btn-sm"
                                        title="Edit Barang"><i class="fa fa-pen"></i></a>



                                </td>

                                <td><span class="text-muted">{{ $no++ }}</span></td>
                                <td>{{ $kalibrasis->instrumentname }}</td>
                                <td>{{ $kalibrasis->instrumentid }}</td>
                                <td>{{ $kalibrasis->serialnumber }}</td>
                                <td>{{ $kalibrasis->frekuensicalibration }}</td>
                                <td>{{ $kalibrasis->needcalibration== 1 ? 'Yes' : 'No'  }}</td>
                                <td>{{ $kalibrasis->lastcalibration}}</td>
                                <td>{{ $kalibrasis->nextcalibration}}</td>
                                <td>{{ $kalibrasis->calibrationby }}</td>
                                <td>{{ $kalibrasis->yearofinvestment }}</td>
                                <td>{{ $kalibrasis->location }}</td>
 
                        @endforeach

                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

@stop
