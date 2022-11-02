
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Detail About</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{asset('template')}}/assets/img/icon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ asset('css') }}/gambar.css">
	@include('layouts.script')
</head>
<body>
	<div class="wrapper">
    @include('layouts.header')
	@include('layouts.side')
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a>
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a>About</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
                                    <div class="d-flex align-items-center">
										<h4 class="card-title">Detail About</h4>
									</div>
								</div>
								<div class="card-body">
									{{-- <form action="{{route('admin-about.store')}}" method="POST" enctype="multipart/form-data"> --}}
                                    @foreach($about as $row)
                                        @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="Nama Kategori">Nama</label>
                                        <input type="text" class="form-control" value={{ $row->nama }}"  name="nama" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="Nama Kategori">Judul</label>
                                        <input type="text" class="form-control" value="{{ $row->judul }}"  name="judul" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="Nama Kategori">Deskripsi</label>
                                        <textarea class="form-control" name="deskripsi" readonly>{{ $row->deskripsi }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <img id="myImg" src="{{ asset($row->gambar) }}" alt="Gambar" style="width:100%;max-width:300px">
                                        <div id="myModal" class="modal">

                                            <!-- The Close Button -->
                                            <span class="close">&times;</span>
                                          
                                            <!-- Modal Content (The Image) -->
                                            <img class="modal-content" id="img01">
                                          
                                            <!-- Modal Caption (Image Text) -->
                                            <div id="caption"></div>
                                          </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="Nama Kategori">Gambar</label>
                                        <input type="file" class="form-control"  name="gambar">
                                    </div> --}}
                                    @endforeach
                                    {{-- <div class="form-group">
                                        <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
                                    </div> --}}
                                    {{-- </form> --}}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@include('layouts.footer')
		</div>
	</div>
	@include('layouts.js')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
	<script >
		$(document).ready(function() {
            $('.ckeditor').ckeditor();
		});

        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
        modal.style.display = "none";
        }
	</script>
</body>
</html>