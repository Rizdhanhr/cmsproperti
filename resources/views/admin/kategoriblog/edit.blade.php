
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Edit Kategori Blog</title>
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
								<a>Blog</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a>Kategori</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
                                    <div class="d-flex align-items-center">
										<h4 class="card-title">Edit Kategori Blog</h4>
									</div>
								</div>
								<div class="card-body">
                                    @foreach ($kategorib as $row)
									<form action="{{route('admin-artikel-kategori.update',$row->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="Nama Kategori">Nama Kategori Blog</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ $row->nama }}" name="nama">
                                        <span style="color : red">@error('nama') {{$message}} @enderror</span>
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
	<script >
		$(document).ready(function() {
			
		});
	</script>
</body>
</html>