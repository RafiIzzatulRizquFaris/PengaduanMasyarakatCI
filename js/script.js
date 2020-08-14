function ondelete(id, officername) {
	$("#delete-data").html("")
	let layout =
		`<form action="<?php echo site_url('Action/delete_petugas');?>" method="POST" >Menghapus <input type="text" name="officer_name" readonly value="${officername}"> dengan id <input type="text" name="petugas_id" readonly value="${id}"><button type="submit" class="btn btn--radius-2 btn-danger btn-block mt-3">Delete</button></form>`
	$("#delete-data").append(layout)
}

function onupdate(id, officername, officerusername, officerphone) {
	$("#update-data").html("");
	let layoutupdate = `<div class="card card-7">
						<div class="card-body">
							<form method="POST" action="<?php echo site_url('Action/update_petugas'); ?>">
								<div class="form-row">
									<div class="name">ID</div>
									<div class="value">
										<div class="input-group">
											<input class="input--style-5" type="text" name="id_officer" readonly value="${id}"/>
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="name">Nama</div>
									<div class="value">
										<div class="input-group">
											<input class="input--style-5" type="text" name="name_officer" value="${officername}"/>
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="name">Username</div>
									<div class="value">
										<div class="input-group">
											<input class="input--style-5" type="text" name="username_officer" value="${officerusername}"/>
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="name">Password</div>
									<div class="value">
										<div class="input-group">
											<input class="input--style-5" type="password"
												name="password_officer" />
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="name">No Telepon</div>
									<div class="value">
										<div class="input-group">
											<input type="text" class="input--style-5" name="telepon_officer" value="${officerphone}">
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="name">Position</div>
									<div class="value">
										<div class="input-group">
											<div class="rs-select2 js-select-simple select--no-search">
												<select name="position_officer">
													<option disabled="disabled" selected="selected">Choose
														option</option>
													<option value="admin">Admin</option>
													<option value="petugas">Officer</option>
												</select>
												<div class="select-dropdown"></div>
											</div>
										</div>
									</div>
								</div>
								<div class="text-center">
									<button class="btn btn--radius-2 btn-success btn-block btn-lg" type="submit">
										Submit
									</button>
								</div>
							</form>
						</div>
					</div>`
	$("#update-data").append(layoutupdate)
}
