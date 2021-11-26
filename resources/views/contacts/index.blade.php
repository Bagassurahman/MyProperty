@extends('layouts.mainTable')

@section('content')

<div class="row">
    <div class="col-4">
        <div class="container p-5">
            <div class="card" style="background: #b71d1d41; border: none; box-shadow: 4px 6px 12px rgba(0, 0, 0, 0.25);">
                <div class="card-body">
                    <h2 class="font-weight-bold mb-5">Contact Us</h2>
                    <ul class="list-unstyled">
                        <li class="mt-3">
                            <a href="tel:+6285335098805" class="text-dencoration-none" target="_blank"><i class="fas fa-phone-square"></i> +6285335098805</a>
                        </li>
                        <li class="mt-3">
                            <a href="https://goo.gl/maps/JHyYgYubeYmhftT39" class="text-dencoration-none" target="_blank"><i class="fas fa-map-marked-alt"></i> Jl. Raya Purbadana RT 1 / RW 1 No.15, Kembaran</a>
                        </li>
                        <li class="mt-3">
                            <a href="https://wa.me/+6285335098805" class="text-dencoration-none" target="_blank"><i class="fab fa-whatsapp-square"></i> +6285335098805</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-8">
        <!--Form-->
        <form class="container p-5"action="{{ route("forms.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Anda">
            </div>
            <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email Anda" >
            </div>

            <div class="form-group">
            <label for="pesan">Pesan</label>
            <textarea class="form-control" id="pesan" name="pesan" rows="3"></textarea>
            </div>
            <!--<input class="btn btn-primary" type="submit" value="Save Data">-->
            <button name="submit" type="submit" class="btn btn-primary">Kirim</button>
        </form>

        <!--End Form-->
    </div>
</div>

@endsection
