<!-- ?php var_dump($this->flashSession->getMessages());?> -->

<?php
	$messages = $this->flashSession->getMessages();
	if(!empty($messages)){
		if(array_key_exists('add-user', $messages)){
			echo '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<strong>Added!</strong> '.$messages["add-user"][0].'
			</div>
			';
		}elseif(array_key_exists('no-id', $messages)){
			echo '
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<strong>Not Id!</strong> '.$messages["no-id"][0].'
			</div>
			';
		}
	}
?>



<div class="card">
	<div class="card-header">
		<h3 class="card-title col-12 text-center">Data User</h3>
	</div>
	<div class="card-body">
		<table class="datatables table table-bordered table-striped">
			<a href="{{url('/user/add') }}">
				<button class="btn btn-sm btn-primary float-right">
					<i class="fa fa-plus-circle" aria-hidden="true"></i>
					Tambah</button>
			</a>
			<thead>
				<tr class="text-center">
					<th>No</th>
					<th>Username</th>
					<th>Level</th>
					<th>Create</th>
					<th>Update</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				{% for user in users %}
					<tr>
						<td>{{loop.index}}</td>
						<td>{{user.username}}</td>
						<td>{{user.level_user}}</td>
						<td>{{user.create_user}}</td>
						<td>{{user.update_user}}</td>
						<td class="text-center">
							<a href="{{url('user/edit/'~user.id_user)}}">
								<button class="btn btn-sm btn-success">
									<i class="fas fa-edit"></i>
									Edit
								</button>
							</a>
							<a href="{{url('user/edit/'~user.id_user)}}">
								<button class="btn btn-sm btn-danger">
									<i class="fas fa-trash"></i>
									Delete
								</button>
							</a>
						</td>
					</tr>
				{% endfor %}
			</tbody>
			<tfoot>
				<tr class="text-center">
					<th>No</th>
					<th>Username</th>
					<th>Level</th>
					<th>Create</th>
					<th>Update</th>
					<th>Aksi</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
