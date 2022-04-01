<div>
  <div class="card">
		<div class="card-body">
			<div class="row">
        <div class="col-lg-4 col-md-3 col-sm-12">
          <input wire:model.debounce.300ms="search" type="text" class="form-control" placeholder="Search for product category here">
        </div>
        <div class="col-lg-1 col-md-2 col-sm-12">
          {{-- <select class="custom-select" wire:model="perPage">
            <option>10</option>
            <option>25</option>
            <option>50</option>
            <option>100</option> --}}
          </select>
        </div>
        <div class="col-lg-5 col-md-4 col-sm-12">

        </div>
        <div class="col-lg-2 col-md-3 col-sm-12">
					<button type="button" class="btn btn-primary btn-sm btn-block h-100" wire:click="OpenAddUserModal()"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Register a new user</button>
				</div>
      </div>

			<table class="table table-striped table-sm">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Date Registered</th>
					</tr>
					<tbody>
						@foreach ($users as $user)
							<tr>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ date('M d,Y', strtotime($user->created_at)) }}</td>
							</tr>
						@endforeach
					</tbody>
			</table>
		</div>
	</div>

	{{-- MODALS --}}

    {{-- Open Create Modal --}}
    <div class="modal fade" wire:ignore.self id="OpenAddUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h5 class="modal-title w-100" id="exampleModalLabel">Add User</h5>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" wire:submit.prevent="addUser">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" placeholder="Enter Name" wire:model="name" >
                        <span class="text-danger">@error('name') {{ $message }}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="" id="" placeholder="Enter Email" class="form-control" wire:model="email">
                        <span class="text-danger">@error('email') {{ $message }}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" placeholder="Enter Password" wire:model="password">
                        <span class="text-danger">@error('password') {{ $message }}@enderror</span>
                    </div>

                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
          </div>
        </div>
    </div>
</div>
