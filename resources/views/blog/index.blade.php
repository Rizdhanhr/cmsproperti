
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
            <h1 class="title-single">Our Amazing Posts</h1>
            <span class="color-text-a">Grid News</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="index.html">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                News Grid
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ News Grid Star /-->
  <section class="news-grid grid">
    <div class="container">
   
      <div class="row">
        @foreach($artikel as $ar)
        <div class="col-md-4">
          <div class="card-box-b card-shadow news-box">
            <div class="img-box-b">
              <img src="{{ asset($ar->gambar) }}" style="height : 400px; width : 450px;" alt="" class="img-b img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-header-b">
                <div class="card-category-b">
                  <a href="{{ route('artikel.show',$ar->id) }}" class="category-b">{{ $ar->nama_kategori }}</a>
                </div>
                <div class="card-title-b">
                  <h2 class="title-2">
                    <a href="{{ route('artikel.show',$ar->id) }}">{{$ar->judul}}
                  </h2>
                </div>
                <div class="card-date">
                  <span class="date-b">{{ date('d F Y', strtotime($ar->created_at)) }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <div class="row">
        <div class="col-sm-12">
          {{ $artikel->links('vendor.pagination.custom') }}
        </div>
      </div>
    </div>
  </section>
  <!--/ News Grid End /-->

  @include('cp.footer')

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  @include('cp.script')

</body>
</html>
