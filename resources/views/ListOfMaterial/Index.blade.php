@extends('templates.dasar')
@php
  $title = 'Data Barang';
  $pretitle = 'COST-QC LAB';

@endphp 

@push('page-action')
  <a href="{{ route('Barang.Create') }}" class="btn btn-primary btn-sm">Create New Material</a>
  
  @endpush

@section('coba')
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">List Of Material</h3>
                  </div>
                  
                  <div class="table-responsive ">
                    <table class="table card-table table-bordered table-vcenter text-nowrap datatable" id="listlowss">
                      <thead>
                        <tr> 
                          <?php $no = 1; ?>
                          <th class="w-1 ml-1">Action 
                           
                          </th>
                          <th>No.</th>
                          <th>Material Code</th>
                          <th>Type of Material</th>
                          <th>Type of budget</th>
                          <th>Name of Material</th>
                          <th>catalog Number</th>
                          <th>Vendor</th>
                          <th>Supplier</th>
                          <th>Prices (IDR)</th>
                          <th>Quantity</th>
                          <th>Unit</th>
                          <th>Safe Stock</th>
                          <th>Maximum Stock</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($barangs as $barang)
                        <tr>
                          <td class="text-end">
                            

                            <a href="{{ route('Barang.edit' , $barang->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            {{-- <form action="{{ route('Barang.destroy' , $barang->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger btn-sm ">
                            </form> --}}
                          </td>
                          
                          <td><span class="text-muted">{{ $no++ }}</span></td>
                          <td> {{ $barang ->Material_Code }}</td>
                          <td>
                          
                            {{ $barang ->Type_of_Material }}
                          </td>
                          <td>
                            {{ $barang ->Type_of_Budget }}
                          </td>
                          <td>
                            {{ $barang ->Name_of_Material}}
                          </td>

                            <td>{{ $barang ->Catalog_Number }}</td>
                          </td>
                          <td>{{ $barang ->Vendor }}</td>
                          <td>{{ $barang ->Supplier }}</td>
                          <td>{{ number_format($barang->Harga, 2, '.', ',') }}</td>
                          <td>{{ $barang ->Quantity }}</td>
                          <td>{{ $barang ->Unit }}</td>
                          <td>{{ $barang ->Safety_Stock }}</td>
                          <td>{{ $barang ->Maximum_Stock }}</td>
                          <td>{{ $barang->Status == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
       
                          @endforeach
                          
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                  
                </div>
              </div>
@endsection