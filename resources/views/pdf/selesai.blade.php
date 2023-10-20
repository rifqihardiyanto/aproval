@extends('member.layout.index')
@section('title', 'Data Pengajuan')

@section('container')
    <!-- Begin Page Content -->
    <!-- /.container-fluid -->

    <div class="container mt-6 mb-7">
        <div class="row justify-content-center">
          <div class="col-lg-12 col-xl-9">
            <div class="card">
              <div class="card-body p-5">
                <h2>
                  Hey {{ $order->nama_pemohon }},
                </h2>
                <p class="fs-sm">
                  This is the receipt for a payment of <strong>Rp. {{ $order->total_harga }}</strong> you made to Spacial Themes.
                </p>
    
                <div class="border-top border-gray-200 pt-4 mt-4">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="text-muted mb-2">Payment No.</div>
                      <strong>#{{ $order->id }}</strong>
                    </div>
                    <div class="col-md-6 text-md-end">
                      <div class="text-muted mb-2">Payment Date</div>
                      <strong>{{ $order->created_at->format('d/m/y') }}</strong>
                    </div>
                  </div>
                </div>
    
                {{-- <div class="border-top border-gray-200 mt-4 py-4">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="text-muted mb-2">Keterangan</div>
                      <strong>
                        John McClane
                      </strong>
                      <p class="fs-sm">
                        989 5th Avenue, New York, 55832
                        <br>
                        <a href="#!" class="text-purple">john@email.com
                        </a>
                      </p>
                    </div>
                    <div class="col-md-6 text-md-end">
                      <div class="text-muted mb-2">Payment To</div>
                      <strong>
                        Themes LLC
                      </strong>
                      <p class="fs-sm">
                        9th Avenue, San Francisco 99383
                        <br>
                        <a href="#!" class="text-purple">themes@email.com
                        </a>
                      </p>
                    </div>
                  </div>
                </div> --}}
    
                <table class="table border-bottom border-gray-200 mt-3">
                  <thead>
                    <tr>
                      <th scope="col" class="fs-sm text-dark text-uppercase-bold-sm px-4">Keperluan</th>
                      <th scope="col" class="fs-sm text-dark text-uppercase-bold-sm px-4">Keterangan</th>
                      <th scope="col" class="fs-sm text-dark text-uppercase-bold-sm text-end px-4">Harga</th>
                      <th scope="col" class="fs-sm text-dark text-uppercase-bold-sm text-end px-4">Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="px-4">{{ $order->keperluan }}</td>
                      <td class="px-4">{{ $order->keterangan }}</td>
                      <td class="text-end px-4"> Rp. {{ $order->harga }}</td>
                      <td class="text-end px-4">{{ $order->jumlah }}</td>
                    </tr>
                    {{-- <tr>
                      <td class="px-0">Website design</td>
                      <td class="text-end px-0">$80.00</td>
                    </tr> --}}
                  </tbody>
                </table>
    
                <div class="mt-5">
                  {{-- <div class="d-flex justify-content-end">
                    <p class="text-muted me-3">Subtotal:</p>
                    <span>{{ $order->total_harga }}</span>
                  </div>
                  <div class="d-flex justify-content-end">
                    <p class="text-muted me-3">Discount:</p>
                    <span>-$40.00</span>
                  </div> --}}
                  <div class="d-flex justify-content-end mt-3">
                    <h5 class="me-3">Total: </h5>
                    <h5 class="text-success">Rp .{{ $order->total_harga }}</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <h1 class="h3 mb-4 text-gray-800"><a href="{{ url('print/'.$order->id) }}"><button type="button" class="btn btn-info">Print</button></a></h1>

      


@endsection


