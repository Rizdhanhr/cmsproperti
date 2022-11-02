
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Tambah Slider</title>
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
								<a>Home</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a>Slider</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
                                    <div class="d-flex align-items-center">
										<h4 class="card-title">Tambah Slider</h4>
									</div>
								</div>
								<div class="card-body">
									<form action="{{route('admin-slider.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="Nama Kategori">Nama Slider</label>
                                        <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" value="{{ old('deskripsi') }}" placeholder="Nama Slider" name="deskripsi">
                                        <span style="color : red">@error('deskripsi') {{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="Nama Kategori">Alamat</label>
                                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" placeholder="Alamat" name="alamat">
                                        <span style="color : red">@error('alamat') {{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="Nama Kategori">Harga</label>
                                        <input type="text" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}" placeholder="Harga" name="harga">
                                        <span style="color : red">@error('harga') {{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="Nama Kategori">Gambar</label>
                                        <input type="file" class="form-control @error('gambar') is-invalid @enderror"  name="gambar">
                                        <span style="color : red">@error('gambar') {{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
                                    </div>
                                    </form>
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
	<script >
		$(document).ready(function() {
			
		});
	</script>
</body>
</html>