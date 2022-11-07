
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  @foreach($artikel as $ar)
  <title>{{ $ar->judul }}</title>
  @endforeach
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
          @foreach($artikel as $ar)
          <div class="title-single-box">
            <h1 class="title-single">{{ $ar->judul }}</h1>
          
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ News Single Star /-->
  <section class="news-single nav-arrow-b">
    <div class="container">
      <div class="row">
        @foreach ($artikel as $ar)
        <div class="col-sm-12">
          <div class="news-img-box">
            <img src="{{ asset($ar->gambar) }}" style="width : 1200px; height : 500px;" alt="" class="img-fluid">
          </div>
        </div>
        @endforeach
        @foreach($artikel as $ar)
        <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
          <div class="post-information">
            <ul class="list-inline text-center color-a">
              {{-- <li class="list-inline-item mr-2">
                <strong>Author: </strong>
                <span class="color-text-a">Morgan Jimenez</span>
              </li> --}}
              <li class="list-inline-item mr-2">
                <strong>Category: </strong>
                <span class="color-text-a">{{ $ar->nama_kategori }}</span>
              </li>
              <li class="list-inline-item">
                <strong>Date: </strong>
                <span class="color-text-a">{{ date('d F Y',strtotime($ar->created_at)) }}</span>
              </li>
            </ul>
          </div>
          <div class="post-content color-text-a">
            {!! $ar->deskripsi !!}
          </div>
          <div class="post-footer">
            <div class="post-share">
              <span>Share: </span>
              <ul class="list-inline socials">
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        @endforeach
        <div class="col-md-10 offset-md-1 col-lg-10 offset-lg-1">
          {{-- <div class="title-box-d">
            <h3 class="title-d">Comments (4)</h3>
          </div> --}}
          {{-- <div class="box-comments">
            <ul class="list-comments">
              <li>
                <div class="comment-avatar">
                  <img src="img/author-2.jpg" alt="">
                </div>
                <div class="comment-details">
                  <h4 class="comment-author">Emma Stone</h4>
                  <span>18 Sep 2017</span>
                  <p class="comment-description">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores reprehenderit, provident cumque
                    ipsam temporibus maiores
                    quae natus libero optio, at qui beatae ducimus placeat debitis voluptates amet corporis.
                  </p>
                  <a href="3">Reply</a>
                </div>
              </li>
              <li class="comment-children">
                <div class="comment-avatar">
                  <img src="img/author-1.jpg" alt="">
                </div>
                <div class="comment-details">
                  <h4 class="comment-author">Oliver Colmenares</h4>
                  <span>18 Sep 2017</span>
                  <p class="comment-description">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores reprehenderit, provident cumque
                    ipsam temporibus maiores
                    quae.
                  </p>
                  <a href="3">Reply</a>
                </div>
              </li>
              <li>
                <div class="comment-avatar">
                  <img src="img/author-2.jpg" alt="">
                </div>
                <div class="comment-details">
                  <h4 class="comment-author">Emma Stone</h4>
                  <span>18 Sep 2017</span>
                  <p class="comment-description">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores reprehenderit, provident cumque
                    ipsam temporibus maiores
                    quae natus libero optio.
                  </p>
                  <a href="3">Reply</a>
                </div>
              </li>
            </ul>
          </div> --}}
          <div class="form-comments">
            <div class="title-box-d">
              <h3 class="title-d"> Leave a Reply</h3>
            </div>
            <form class="form-a">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <label for="inputName">Enter name</label>
                    <input type="text" class="form-control form-control-lg form-control-a" id="inputName" placeholder="Name *"
                      required>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <label for="inputEmail1">Enter email</label>
                    <input type="email" class="form-control form-control-lg form-control-a" id="inputEmail1"
                      placeholder="Email *" required>
                  </div>
                </div>
                <div class="col-md-12 mb-3">
                  <div class="form-group">
                    <label for="inputUrl">Enter website</label>
                    <input type="url" class="form-control form-control-lg form-control-a" id="inputUrl" placeholder="Website">
                  </div>
                </div>
                <div class="col-md-12 mb-3">
                  <div class="form-group">
                    <label for="textMessage">Enter message</label>
                    <textarea id="textMessage" class="form-control" placeholder="Comment *" name="message" cols="45"
                      rows="8" required></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <button type="submit" class="btn btn-a">Send Message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ News Single End /-->

  @include('cp.footer')

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

 @include('cp.script')

</body>
</html>
