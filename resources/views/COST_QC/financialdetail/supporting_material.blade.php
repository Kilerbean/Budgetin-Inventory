@extends('COST_QC.financialdetail.masterfinancial')
@php
  $title = 'Financial Supporting Material';
  $pretitle = 'COST-QC LAB';

@endphp 
@section('financial')


<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"> Supporting Material </h3>
      </div>
    
    <div class="table-responsive table-bordered">
        <table class="table card-table table-vcenter table-bordered text-nowrap datatable">
          <thead>
            <thead>
              <?php $no = 1; ?>
              <tr style="background-color: rgb(204, 90, 90);">
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
                      <td class="text-center ">{{number_format($financials->actual, 2, '.', ',')  }}</td>
                  @endforeach
              </tr>
              <tr>
                <th>Review</th>
                @foreach ($financial as $financials)
                    <td class="text-center {{$financials->actual > $financials->budget ? 'bg-danger' : 'bg-success'}}">{{number_format($financials->budget - $financials->actual, 2, '.', ',') }}</td>
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
                    <td class="text-center"> <a class="btn btn-primary btn-sm" href="{{ route('financial.edit',$financials->id) }}" >Edit Budget</a></td>
                @endforeach
            </tr>
          </tbody>
          </table>
  
</table>
</div>

    </div>
</div>
@endsection