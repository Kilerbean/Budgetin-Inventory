@extends('layouts.master')
@php
    $titles = 'QC - List of Material';
    $title = 'Edit Quantity Purchasing Material';
    $pretitle = 'COST-QC LAB';
    $pages = $title;
@endphp
@section('title', $pages)
@section('content')
    <div class="row">
        <div class="col">
            <a class="btn btn-info btn-sm" href="{{ route('income.index') }}"><i class="fa fa-clipboard-list"></i><i
                    class="fa fa-turn-up"></i> List of Incoming Material</a>
            <a href="{{ route('Barang.show', $barang->id) }}" class="btn btn-primary btn-sm">Back</a>
        </div>
    </div>
    <div class="mx-2 mt-2">
        <h4 class="mb-2">Edit Quantity Incoming Material</h4>
    </div>


    <div class="card" style="background-color: rgb(230, 225, 225);">

        <div class="card-body ">
            <form action="{{ route('edit.quantity', $income->id) }}" class="" method="post">

                @csrf
                @method('PUT')


                <label class="form-label"> Catalog Number : {{ $income->Catalog_Number }} </label>
                <br>
                <label class="form-label"> Name Materials : {{ $income->Name_of_Material }} </label>
                <br>
                <label class="form-label"> Type of Material : {{ $income->Type_of_Material }} </label>
                <br>
                <label class="form-label"> Type of Budget : {{ $barang->Type_of_Budget }} </label>
                <br>
                <label class="form-label"> Batch Number : {{ $income->no_batch }} </label>
                <br>
                <label class="form-label"> Quantity : {{ $income->Quantity }} </label>
                <br>

                <div class="mb-3">
                    <label for="Quantity" class="form-label">Adjusting Quantity </label>
                    <input type="number" class="form-control" name="Quantity" placeholder="0" min=0
                        value="{{ $income->Quantity }}">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="reason" class="form-label">Reason </label>
                        <input class="form-control" name="reason" placeholder="Reason" value="{{ $income->reason }}">
                    </div>
                </div>

                <br>

                <div class="mb-3">
                    <input type="submit" value="Save" class="btn btn-primary">
                </div>
        </div>
        </form>

    </div>


@stop
