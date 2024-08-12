<x-app-layout>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(' SISTEM INFORMASI PEMBUKAAN REKENING KANTOR CABANG BANK DKI') }}
        </h2>
        <br>

        <section class="content">
            <div class="container-fluid">

                <div class="col-md-12">

                    <div class="card card-primary">
                        <form role="form" id="Form1" method="POST" action="{{ '/customerservice/store' }}">
                            @csrf
                            <div class="card-body" style=" margin-left:20px; width: 100%;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Tempat Lahir</th>
                                            <th scope="col">Tanggal Lahir</th>
                                            <th scope="col">Jenis Kelamin</th>
                                            <th scope="col">Pekerjaan</th>
                                            <th scope="col">Nominal Setor</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody class="table-group-divider">
                                        @foreach($pengajuan as $item)
                                        <tr>
                                            <td>{{ $item->id_nasabah }}</th>
                                            <td>{{ $item->nama_nasabah }}</td>
                                            <td>{{ $item->tempat_lahir }}</td>
                                            <td>{{ $item->tanggal_lahir }}</td>
                                            <td>{{ $item->jenis_kelamin }}</td>
                                            <td>{{ $item->pekerjaan }}</td>
                                            <td>{{ $item->nominal_setor }}</td>
                                            <td>{{ $item->status}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <a href="{{ url('/customerservice/dashboard') }}" style="margin-right: 5px; float: right;" type="button" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </x-slot>

</x-app-layout>
<script>
</script>