
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>About</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  @include('cp.css')
</head>
<body>
  @include('cp.navbar')

  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">We Do Great Design For Creative Folks</h1>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                About
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ About Star /-->
  <section class="section-about">
    <div class="container">
      <div class="row">
      
        <div class="col-sm-12">
          @foreach ($about as $ab)
          <div class="about-img-box">
            <img src="{{ asset('frontend') }}/img/slide-about-1.jpg" alt="" class="img-fluid">
          </div>
          <div class="sinse-box">
            <h3 class="sinse-title">{{$ab->judul}}
          </div>
          @endforeach
        </div>

        @foreach ($about as $ab)
        <div class="col-md-12 section-t8">
       
          <div class="row">
            <div class="col-md-6 col-lg-5">
              <img src="{{ asset($ab->gambar) }}" style="width : 400px; height : 500px;" alt="" class="img-fluid">
            </div>
            <div class="col-md-6 col-lg-7 section-md-t3">
              <div class="title-box-d">
                <h3 class="title-d">{{ $ab->nama }}
              </div>
              <p class="color-text-a">
                {!! $ab->deskripsi !!}
              </p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!--/ About End /-->

  <!--/ Team Star /-->
  <section class="section-agents section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Meet Our Team</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        @foreach ($team as $row)
        <div class="col-md-4">
          <div class="card-box-d">
            <div class="card-img-d">
              <img src="{{ asset($row->gambar) }}"  style="height : 400px; width : 510px" alt="" class="img-d img-fluid">
            </div>
            <div class="card-overlay card-overlay-hover">
              <div class="card-header-d">
                <div class="card-title-d align-self-center">
                  <h3 class="title-d">
                    <a class="link-two">{{$row->nama}}
                  </h3>
                </div>
              </div>
              <div class="card-body-d">
                <p class="content-d color-text-a">
                  {{ $row->deskripsi }}
                </p>
                <div class="info-agents color-a">
                  <p>
                    <strong>Phone: </strong>{{$row->phone}}</p>
                  <p>
                    <strong>Email: </strong>{{ $row->email }}</p>
                </div>
              </div>
              <div class="card-footer-d">
                <div class="socials-footer d-flex justify-content-center">
                  <ul class="list-inline">
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-dribbble" aria-hidden="true"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        
        
      </div>
    </div>
  </section>
  <!--/ Team End /-->

  @include('cp.footer')

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  @include('cp.script')

</body>
</html>
