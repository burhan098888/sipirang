@extends('dashboard.layouts.main')

@section('container')
    <div class="col-md-10 p-0">
        <div class="card-body text-end">
            @if (session()->has('rentSuccess'))
                <div class="col-md-16 mx-auto alert alert-success text-center  alert-success alert-dismissible fade show"
                    style="margin-top: 50px" role="alert">
                    {{ session('rentSuccess') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('deleteRent'))
                <div class="col-md-16 mx-auto alert alert-success text-center  alert-dismissible fade show"
                    style="margin-top: 50px" role="alert">
                    {{ session('deleteRent') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (auth()->user()->role_id === 1)
                <button type="button" class="mb-3 btn button btn-primary" data-bs-toggle="modal"
                    data-bs-target="#pinjamRuangan">
                    Pinjam
                </button>
            @endif
            <div class="table-responsive">
                <div class="d-flex justify-content-start">
                    {{ $adminRents->links() }}
                </div>
                <table class="table table-hover table-stripped table-bordered text-center dt-head-center" id="datatable">
                    <thead class="table-info">
                        <tr>
                            <th scope="row">No.</th>
                            <th scope="row">Kode Ruangan</th>
                            @if (auth()->user()->role_id <= 2)
                                <th scope="row">Nama Peminjam</th>
                            @endif
                            <th scope="row">Mulai Pinjam</th>
                            <th scope="row">Selesai Pinjam</th>
                            <th scope="row">Tujuan</th>
                            <th scope="row">Waktu Transaksi</th>
                            <th scope="row">Kembalikan</th>
                            <th scope="row">Status Pinjam</th>
                            <th scope="row">Keterangan</th>
                            @if (auth()->user()->role_id <= 2)
                                <th scope="row">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @if ($adminRents->count() > 0)
                            @foreach ($adminRents as $rent)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th scope="row">
                                    <td><a href="/dashboard/rooms/{{ $rent->room->code }}" class="text-decoration-none"
                                            role="button">{{ $rent->room->code }}</a></td>
                                    <td>{{ $rent->user->name }}</td>
                                    <td>{{ $rent->time_start_use }}</td>
                                    <td>{{ $rent->time_end_use }}</td>
                                    <td>{{ $rent->purpose }}</td>
                                    <td>{{ $rent->transaction_start }}</td>
                                    @if ($rent->status == 'dipinjam')
                                        <td>
                                            <button class="btn btn-success" type="button" style="padding: 2px 10px" data-bs-toggle="modal" data-bs-target="#keteranganModal-{{ $rent->id }}">
                                                <i class="bi bi-check fs-5"></i>
                                            </button>

                                            <div class="modal fade" id="keteranganModal-{{ $rent->id }}" tabindex="-1" aria-labelledby="keteranganModalLabel-{{ $rent->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="/dashboard/rents/{{ $rent->id }}/endTransaction" method="POST">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="keteranganModalLabel-{{ $rent->id }}">Keterangan Pengembalian</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="keterangan-{{ $rent->id }}" class="form-label">Keterangan</label>
                                                                    <textarea class="form-control" id="keterangan-{{ $rent->id }}" name="keterangan" rows="3" required></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    @else
                                        @if (!is_null($rent->transaction_end))
                                            <td>{{ $rent->transaction_end }}</td>
                                        @else
                                            <td>-</td>
                                        @endif
                                    @endif
                                    <td>{{ $rent->status }}</td>
                                    <td>
                                        @if ($rent->status == 'dikembalikan')
                                            Sudah dikembalikan
                                        @elseif ($rent->status == 'ditolak')
                                            Peminjaman ditolak
                                        @else
                                            -
                                        @endif
                                    </td>

                                    @if (auth()->user()->role_id === 1)
                                        <td>
                                            <form action="/dashboard/rents/{{ $rent->id }}" method="post"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="bi bi-trash-fill text-danger border-0"
                                                    onclick="return confirm('Hapus data peminjaman?')"></button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10" class="text-center">
                                    -- Belum Ada Daftar Peminjam --
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @extends('dashboard.partials.rentModal')
@endsection
