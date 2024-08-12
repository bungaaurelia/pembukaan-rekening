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

        <!-- @if(session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
        @endif -->

        <div class="row">

            <div class="card" style="width: 18rem; margin-left:20px;">
                <img src="https://img.freepik.com/free-vector/customer-filling-up-survey-form_74855-4398.jpg?t=st=1723358143~exp=1723361743~hmac=52a23af384247053b1c1eb37a17537bde4158e7341452924a1264b24feb82a73&w=900" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">List Data Rekening Baru</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="{{ url('supervisi/pengajuan-rekening/view') }}" class="btn btn-primary">List Rekening</a>
                </div>
            </div>
        </div>
    </x-slot>

</x-app-layout>