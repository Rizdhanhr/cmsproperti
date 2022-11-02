
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Slider</title>
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
										<h4 class="card-title">Slider</h4>
										<button class="btn btn-primary btn-round ml-auto" onclick="window.location.href='{{route('admin-slider.create')}}'">
											<i class="fa fa-plus"></i>
											Add Row
										</button>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th width="10%">No</th>
													<th>Nama</th>
													<th>Alamat</th>
													<th>Gambar</th>
													<th width="20%">Opsi</th>
												</tr>
											</thead>
											<tbody>
                                                @php $no=1; @endphp
                                                @foreach ($slider as $row)
												<tr>
													<td>{{$no++}}</td>
													<td>{{$row->deskripsi}}</td>
													<td>{{$row->alamat}}</td>
													<td><img src="{{asset($row->gambar)}}" width="200"></td>
													<td>
														<div class="form-button-action">
                                                        <button class="btn btn-sm btn-primary" onclick="window.location.href='{{route('admin-slider.edit',$row->id)}}'">Edit</button>
                                                        &nbsp;
														<form action="{{route('admin-slider.destroy',$row->id)}}"  method="POST">
														@csrf
														@method('DELETE')
														<button  class="btn btn-sm btn-danger" onclick="deleteConfirm(event)" type="submit">Hapus</button>
														</form>
														</div>
                                                    </td>
												</tr>
                                                @endforeach
											</tbody>
										</table>
									</div>
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
	@include('sweetalert::alert')
	<script src="{{asset('template')}}/assets/js/plugin/sweetalert/sweetalert.min.js"></script>
	<script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			
		});

		window.deleteConfirm = function (e) {
				e.preventDefault();
				var form = e.target.form;
				swal({
					title: "Apakah anda ingin menghapus data?",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						form.submit();
					}
				});
		}
	</script>
</body>
</html>