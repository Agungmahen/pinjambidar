@extends('welcome')
{{-- code untuk memasukkan view lain --}}
@section('content')
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://kliklogistics.co.id/wp-content/uploads/2023/06/dokumen-pengiriman-barang.jpg" height="500px" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://assets.digination.id/crop/0x0:0x0/x/photo/2020/10/14/3868427104.png" height="500px" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://www.waresix.com/wp-content/uploads/2023/06/WhatsApp-Image-2023-06-14-at-2.52.09-PM-2-1024x575.jpeg" height="500px" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
@endsection