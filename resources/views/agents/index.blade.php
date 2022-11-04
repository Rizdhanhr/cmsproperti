
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
            <h1 class="title-single">Our Amazing Agents</h1>
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
                Agents Grid
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Agents Grid Star /-->
  <section class="agents-grid grid">
    <div class="container">
      <div class="row">
        @foreach($agents as $ag)
        <div class="col-md-4">
          <div class="card-box-d">
            <div class="card-img-d">
              <img src="{{ asset($ag->gambar) }}" style="width : 400px; height : 400px;" alt="" class="img-d img-fluid">
            </div>
            <div class="card-overlay card-overlay-hover">
              <div class="card-header-d">
                <div class="card-title-d align-self-center">
                  <h3 class="title-d">
                    <a href="{{route('agents.show',$ag->id)}}" class="link-two">{{$ag->nama}}
                  </h3>
                </div>
              </div>
              <div class="card-body-d">
                <p class="content-d color-text-a">
                 
                </p>
                <div class="info-agents color-a">
                  <p>
                    <strong>Phone: </strong> {{ $ag->phone }}</p>
                  <p>
                    <strong>Email: </strong> {{ $ag->email }}</p>
                </div>
              </div>
              <div class="card-footer-d">
                <div class="socials-footer d-flex justify-content-center">
                  <ul class="list-inline">
                    <li class="list-inline-item">
                      <a target="_blank" href="{{ $ag->facebook }}" class="link-one">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a target="_blank" href="{{ $ag->whatsapp }}" class="link-one">
                        <i class="fa fa-whatsapp" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a target="_blank" href="{{ $ag->instagram }}" class="link-one">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
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
   
      <div class="row">
        <div class="col-sm-12">
          {{-- @if ($paginator->hasPages())
          <nav class="pagination-a">
            <ul class="pagination justify-content-end">
              @if ($paginator->onFirstPage())
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">
                  <span class="ion-ios-arrow-back"></span>
                </a>
              </li>
              @else
              <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}">
                  <span class="ion-ios-arrow-back"></span>
                </a>
              </li>
              @endif
              @foreach ($elements as $element)
              @if (is_string($element))
              <li class="page-item disabled">{{ $element }}</li>
              @endif

              @if (is_array($element))
              @foreach ($element as $page => $url)
              @if ($page == $paginator->currentPage())
              <li class="page-item active">
                <a class="page-link">{{ $page }}</a>
              </li>
              @else
              <li class="page-item">
                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
              </li>
              @endif
              @endforeach
              @endif
              @endforeach

              @if ($paginator->hasMorePages())
              <li class="page-item next">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}">
                  <span class="ion-ios-arrow-forward"></span>
                </a>
              </li>
              @else
              <li class="page-item next disabled">
                <a class="page-link" href="#">
                  <span class="ion-ios-arrow-forward"></span>
                </a>
              </li>
              @endif
            </ul>
          </nav>
          @endif --}}
          {{ $agents->links('vendor.pagination.custom') }}
        </div>
      </div>
    </div>
  </section>
  <!--/ Agents Grid End /-->

  @include('cp.footer')

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
 @include('cp.script')

</body>
</html>
