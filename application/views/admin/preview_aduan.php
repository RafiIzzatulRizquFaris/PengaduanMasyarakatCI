<div class="container-fluid">

					<!-- Page Heading -->
					<h1 class="h3 mb-2 text-gray-800">Data Pengaduan</h1>
					<p class="mb-4">Mencakup segala data pengaduan yang telah dimasukkan oleh masyarakat</p>

					<!-- DataTales Example -->
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary text-center">Data Pengaduan</h6>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
									<thead>
										<tr>
											<th>ID</th>
											<th>Judul Pengaduan</th>
											<th>Tanggal</th>
											<th>Status</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
									foreach ($pengaduan as $data) {
									?>
										<tr>
											<td><?= $data->id_pengaduan?></td>
											<td><?= $data->judul?></td>
											<td><?= $data->tgl_pengaduan?></td>
											<td><?= $data->status?></td>
										</tr>
										<?php
									}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>

				</div>