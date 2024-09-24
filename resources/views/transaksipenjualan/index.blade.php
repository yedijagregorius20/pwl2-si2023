<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Table Transaksi Penjualan</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a class="btn btn-md btn-success mb-3">ADD TRANSAKSI</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Kasir</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                    <!-- <th>PIC Supplier</th>
                                    <th>No HP Supplier</th>
                                    <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->nama_kasir }}</td>
                                    <td>{{ $transaction->tanggal_transaksi }}</td>
                                    <td>{{ $transaction->price }}</td>
                                    <td class="text-center">
                                        <a  class="btn btn-sm btn-dark">SHOW</a>
                                        <a  class="btn btn-sm btn-warning">EDIT</a>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Transaksi belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // message with sweetalert
         @if(session('success'))
            Swal.fire({
                icon: 'success',
                itle: 'BERHASIL',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
        });
        @elseif(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'GAGAL',
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
        });
        @endif


    </script>
</body>
</html>