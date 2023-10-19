{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}



<div class="card">
    <div class="card-header">
        <h3 class="card-title">List Of Stock Opname </h3>
    </div>

    <div class="container">
        <form method="GET" action="" class="row">
            <div class="col-md-3">
                <label for="">Start Date</label>
                <input class="form-control" type="date" name="start_date" value="{{ old('start_date') }}">
            </div>

            <div class="col-md-3">
                <label for="">End Date</label>
                <input class="form-control" type="date" name="end_date" value="{{ old('end_date') }}">
            </div>
            <div class="col-md-1 pt-4">
                <button type="submit" class="btn btn-success ">Filter</button>

            </div>
            {{-- <div class="col-md-1 pt-4">
        <button type="button" id="reset-button" class="btn btn-success ">Reset</button>
        </div> --}}
        </form>
    </div>
    <div class="table-responsive ">

        <table class="table table-bordered text-nowrap " id="listlow" style="width: 100%">
            <thead>
                <tr>
                    <?php $no = 1; ?>
                    <th style="background-color: lightgray;">No.</th>
                    <th style="background-color: lightgray;">Type</th>
                    <th style="background-color: lightgray;">Start Date</th>
                    <th style="background-color: lightgray;">End Date</th>

                    <th style="background-color: lightgray;">Accuracy</th>
                    <th style="background-color: lightgray;">Data</th>
                    {{-- <th style="background-color: lightgray;">Data</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($opname as $opnames)
                    <tr>
                        <td><span class="text-muted">{{ $no++ }}</span></td>
                        <td> {{ $opnames->type }}</td>
                        <td>{{ $opnames->created_at }}</td>
                        <td>{{ $opnames->end_at }}</td>
                        <td>{{ number_format($opnames->accuracy, 2) }}%</td>
                        <td><button class="btn btn-primary btn-sm"
                                onclick="showDataModal({{ json_encode($opnames->data) }})">Show Data</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Modal -->
        <div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="dataModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="dataModalLabel">Adjustment Quantity</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="dataArray"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk menampilkan data dalam modal
        function showDataModal(dataJson) {
            var data = JSON.parse(dataJson);

            var modalContent = '';

            // Tampilkan data dari tipe "income"
            if (data.hasOwnProperty('income')) {
                modalContent += '<h3>Increase Adjustment Quantity:</h3>';
                modalContent += formatData(data.income, ['id', 'No_PR', 'Total', 'Type_of_Material', 'Prices', 'Propose',
                    'Expire_Date', 'No_PO', 'Status', 'tipe_transaksi', 'updated_at', 'request_by',
                    'PO_Date','Unit','input_by','created_at','packingsize','packingsize_unit'
                ]);
            }

            // Tampilkan data dari tipe "usage"
            if (data.hasOwnProperty('usage')) {
                modalContent += '<h3>Decrease Adjustment Quantity:</h3>';
                modalContent += formatData(data.usage, ['id', 'Type_of_Material', 'Status', 'Expire_Date',
                    'tipe_transaksi', 'updated_at', 'Open_By','Unit','input_by','created_at',
                ]);
            }

            document.getElementById('dataArray').innerHTML = modalContent;
            $('#dataModal').modal('show');
        }

        function formatData(dataArray, excludedKeys) {
            var formattedData = '';
            dataArray.forEach((item, index) => {
                formattedData += (index + 1) + '. ';
                for (var key in item) {
                    if (!excludedKeys.includes(key)) {
                        if (key === 'created_at') {
                            var createdAt = new Date(item[key]);
                            var formattedDate = createdAt.toISOString().slice(0, 10);
                            formattedData += 'created_at : ' + formattedDate + '<br> ';
                        } else {
                            formattedData += key + ' : ' + item[key] + '<br> ';
                        }
                    }
                }
                formattedData += '<br><br>';
            });
            return formattedData;
        }
    </script>
