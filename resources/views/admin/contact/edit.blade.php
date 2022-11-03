
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Edit Contact</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{asset('template')}}/assets/img/icon.ico" type="image/x-icon"/>
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
								<a>Contact</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
                                    <div class="d-flex align-items-center">
										<h4 class="card-title">Edit Contact</h4>
									</div>
								</div>
								<div class="card-body">
                                    @foreach ($contact as $row)
									<form action="{{route('admin-contact.update',$row->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="Nama Kategori">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $row->email }}"  name="email">
                                        <span style="color : red">@error('email') {{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="Nama Kategori">Nomor</label>
                                        <input type="text" class="form-control @error('nomor') is-invalid @enderror" value="{{ $row->nomor }}"  name="nomor">
                                        <span style="color : red">@error('nomor') {{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="Nama Kategori">Link Whatsapp</label>
                                        <input type="text" class="form-control @error('whatsapp') is-invalid @enderror" value="{{ $row->whatsapp }}" name="whatsapp">
                                        <span style="color : red">@error('whatsapp') {{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="Nama Kategori">Alamat</label>
                                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{ $row->alamat }}" name="alamat">
                                        <span style="color : red">@error('alamat') {{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="Nama Kategori">Deskripsi</label>
                                        <textarea class="ckeditor form-control @error('deskripsi') is-invalid @enderror" name="deskripsi">{{ $row->deskripsi }}</textarea>
                                        <span style="color :red">@error('deskripsi') {{ $message }} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
                                    </div>
                                    </form>
                                    @endforeach
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


	</script>
</body>
</html>