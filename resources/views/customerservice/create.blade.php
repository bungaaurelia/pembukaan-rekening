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
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nama" id="nama_nasabah">Nama </label>
                                        <input type="text" maxlength="50" name="nama_nasabah" class="form-control" id="nama" placeholder="Nama Sesuai KTP" pattern="[a-zA-Z\s]+" required="required">
                                        @error('nama_nasabah') <span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nama" id="jenis_kelamin">Jenis Kelamin </label>
                                        <ul class="list-group">
                                            <li class="">
                                                <label class="radio-inline">
                                                    <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki
                                                </label>
                                                <label class="radio-inline ml-5">
                                                    <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
                                                </label>
                                            </li>
                                        </ul>
                                        <!-- @error('jenis_kelamin') <span class="text-danger">{{ $message }}</span>@enderror -->
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nama" id="tempat_lahir_judul">Tempat Lahir </label>
                                        <input type="text" maxlength="25" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="" required="required">
                                        @error('tempat_lahir') <span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nama" id="pekerjaan">Pekerjaan </label>
                                        <input type="text" maxlength="100" name="pekerjaan" class="form-control" id="pekerjaan" placeholder="" required="required">
                                        @error('pekerjaan') <span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nama" id="tanggal_lahir">Tanggal Lahir </label>
                                        <input type="date" maxlength="100" name="tanggal_lahir" class="form-control" id="tanggal_lahir" placeholder="" required="required">
                                        @error('tanggal_lahir') <span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nama" id="nominal">Nominal Setor </label>
                                        <div class="row">
                                            <div class="col ml">
                                                <input type="text" maxlength="" name="nominal_setor" class="nominal_setor form-control" id="nominal_setor" placeholder="1,000,000.00" required="required">
                                            </div>
                                        </div>
                                    </div>
                                    @error('nominal_setor') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div style="margin: 10px; margin-left:35px;">
                                <button type="submit" style="margin-left:20px; float: right; width:max-content;" class="btn btn-primary submit">Save</button>
                                <a href="{{ url('/customerservice/dashboard') }}" style="margin-right: 5px; float: right;" type="button" class="btn btn-secondary">Kembali</a>
                            </div><br>

                        </form>
                    </div>

                </div>
            </div>
        </section>
    </x-slot>

</x-app-layout>
<script>
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix === undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    document.getElementById('nominal_setor').addEventListener('keyup', function(e) {
        this.value = formatRupiah(this.value, 'Rp. ');
    });
</script>