
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>EstateAgency Bootstrap Template</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

    @include('cp.css')

  <!-- =======================================================
    Theme Name: EstateAgency
    Theme URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  @include('cp.navbar')

  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
      
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Name</h1>
            <span class="color-text-a">Grid Properties</span>
          </div>
        </div>

        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Properties Grid
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Property Grid Star /-->
  <section class="property-grid grid">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="grid-option">
            <form>
              <select class="custom-select">
                <option selected>All</option>
                <option value="1">New to Old</option>
                <option value="2">For Rent</option>
                <option value="3">For Sale</option>
              </select>
            </form>
          </div>
        </div>
        @foreach($properti as $row)
        <div class="col-md-4">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="{{ asset($row->gambar) }}" style="width : 455px; height : 400px;" alt="" class="img-a img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="{{ url('properti-detail',$row->id) }}">{{ $row->nama }}
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">{{ $row->harga }}</span>
                  </div>
                  <a href="property-single.html" class="link-a">Click here to view
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title">Area</h4>
                      {{ $row->luas }}
                    </li>
                    <li>
                      <h4 class="card-info-title">Beds</h4>
                      <span>2</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Baths</h4>
                      <span>4</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Garages</h4>
                      <span>1</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="row">
        <div class="col-sm-12">
            {{ $properti->links('vendor.pagination.custom') }}
        </div>
      </div>
    </div>
  </section>
  <!--/ Property Grid End /-->

  @include('cp.footer')

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

 @include('cp.script')

</body>
</html>
