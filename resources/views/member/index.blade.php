@extends('member.layout.index')

@section('title', 'Selamat Datang')

@section('container')
    <div class="col-lg-8 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Selamat Datang, {{Auth::guard('webmember')->user()->nama_member}}! 🎉</h5>
                        <p class="mb-4">
                            Untuk melihat riwayat pengajuan anda.
                        </p>

                        <a href="{{ url('/data/pengajuan') }}" class="btn btn-sm btn-outline-primary">Lihat Pengajuan</a>
                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140"
                            alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png" />
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
