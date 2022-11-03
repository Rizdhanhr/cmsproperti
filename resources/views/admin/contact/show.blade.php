
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Contact</title>
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
										<h4 class="card-title">Contact</h4>
									</div>
								</div>
								<div class="card-body">
                                    @foreach ($contact as $row)
									@method('PUT')
                                    <div class="form-group">
                                        <label for="Nama Kategori">Email</label>
                                        <input type="email" class="form-control" value="{{ $row->email }}"  name="email" readonly>
                                     
                                    </div>
                                    <div class="form-group">
                                        <label for="Nama Kategori">Nomor</label>
                                        <input type="text" class="form-control" value="{{ $row->nomor }}"  name="nomor" readonly>

                                    </div>
                                    <div class="form-group">
                                        <label for="Nama Kategori">Link Whatsapp</label>
                                        <input type="text" class="form-control" value="{{ $row->whatsapp }}"  name="whatsapp" readonly>
                                       
                                    </div>
                                    <div class="form-group">
                                        <label for="Nama Kategori">Alamat</label>
                                        <input type="text" class="form-control" value="{{ $row->alamat }}"  name="alamat" readonly>
                                        
                                    <div class="form-group">
                                        <label for="Nama Kategori">Deskripsi</label>
                                        <textarea class="ckeditor form-control" name="deskripsi" readonly>{{ $row->deskripsi }}</textarea>
                                        
                                    </div>
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