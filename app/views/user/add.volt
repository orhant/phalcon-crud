<div class="card">
	<div class="card-header">
		<h3 class="card-title col-12 text-center">Tambah Data User</h3>
	</div>
	<form class="form-horizontal" action="" method="post">
		<div class="card-body">
			<div class="form-group row">
				<label for="username" class="col-sm-2 col-form-label">Username</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="username" name="username" placeholder="Username" required autofocus>
				</div>
			</div>
			<div class="form-group row">
				<label for="password" class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="password" name="password" placeholder="Password" required autofocus>
				</div>
			</div>
            <div class="form-group row">
				<label for="level_user" class="col-sm-2 col-form-label">Level</label>
				<div class="col-sm-10">
					<select class="select2 form-control" name="level_user" required autofocus>
                        <option value="">Pilih Level</option>
                        <option value="dosen">Dosen</option>
                        <option value="mahasiswa">Mahasiswa</option>
                    </select>
				</div>
			</div>

			<div class="form-group row">
				<div class="row offset-sm-2 col-sm-10">
					<div class="col-6 pl-0">
						<a href="{{ url('/user') }}">
							<button type="button" class="btn btn-warning col-12">Cancel</button>
						</a>
					</div>
					<div class="col-6 pr-0">
						<button type="submit" name="submit" class="btn btn-primary col-12">Tambah User</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
