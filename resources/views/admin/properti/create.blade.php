
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Tambah Properti</title>
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
								<a>Properti</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
                                    <div class="d-flex align-items-center">
										<h4 class="card-title">Tambah Properti</h4>
									</div>
								</div>
								<div class="card-body">
									<form action="{{route('admin-properti.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="Nama Kategori">Nama</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="Nama" name="nama">
                                        <span style="color : red">@error('nama') {{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="Nama Kategori">Alamat</label>
                                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" placeholder="Alamat" name="alamat">
                                        <span style="color : red">@error('alamat') {{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kategori</label>
                                        
                                        <select class="form-control" name="kategori">
                                            <option selected>Pilih Kategori</option>
                                            @foreach($kategori as $kat)
                                            <option  value="{{ $kat->id }}">{{ $kat->nama }}</option>
                                            @endforeach
                                        </select>
                                       
                                        <span style="color:red">@error('kategori') {{ $message }} @enderror</span>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="Nama Kategori">Deskripsi</label>
                                        <textarea class="ckeditor form-control @error('deskripsi') is-invalid @enderror" name="deskripsi">{{ old('deskripsi') }}</textarea>
                                        <span style="color :red">@error('deskripsi') {{ $message }} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="Nama Kategori">Luas</label>
                                        <input type="text" class="form-control @error('luas') is-invalid @enderror" value="{{ old('luas') }}" placeholder="Luas" name="luas">
                                        <span style="color : red">@error('luas') {{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="Nama Kategori">Keunggulan</label>
                                        <textarea class="ckeditor form-control @error('keunggulan') is-invalid @enderror" name="keunggulan">{{ old('keunggulan') }}</textarea>
                                        <span style="color :red">@error('keunggulan') {{ $message }} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="Nama Kategori">Harga</label>
                                        <input type="number" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}" placeholder="Harga" name="harga">
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
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
	<script >
		$(document).ready(function() {
            $('.ckeditor').ckeditor();
		});


	</script>
</body>
</html>