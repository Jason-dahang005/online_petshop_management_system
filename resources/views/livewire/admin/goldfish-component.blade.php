<div>
    <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-4 col-md-3 col-sm-12">
              <input wire:model.debounce.300ms="search" type="text" class="form-control" placeholder="Search for Goldfish here">
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
              <button type="button" class="btn btn-primary btn-sm btn-block h-100" wire:click="OpenGoldfishModal()" ><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Add New Goldfish</button>
            </div>
          </div>
          <hr>
          <table class="table table-striped">
            <thead class="bg-dark">
              <tr>
                <th width="10%">Name</th>
                <th width="10%">Image</th>
                <th width="30%">Description</th>
                <th width="10%">Price</th>
                <th width="15%">Status</th>
                <th width="12%">Date Added</th>
                <th width="13%">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($goldF as $fish)
                <tr>
                    
                  <td>{{ $fish->name }}</td>
                  <td><img src="{{ asset('/images/image') }}/{{ $fish->image }}" alt="" style="max-width: 80px"></td>
                  <td>{{ $fish->description }}</td>
                  <td>{{ $fish->price }}</td>
                  <td>{{ $fish->status }}</td>
                </tr>
                @endforeach
            </tbody>
          </table>
          <hr>
          <div class="d-flex justify-content-end">
            
          </div>
        </div>
    </div>


    {{-- MODALS --}}
    <div class="modal fade" wire:ignore.self id="OpenGoldfishModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Goldfish</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" wire:submit.prevent="addGoldfish">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" placeholder="Enter Name" wire:model="name" wire:keyup="generateslug">
                        <span class="text-danger">@error('name') {{ $message }}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" placeholder="Enter Name" wire:model="slug">
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" class="form-control" placeholder="Enter Name" wire:model="description">
                        <span class="text-danger">@error('description') {{ $message }}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" class="form-control" placeholder="Enter Name" wire:model="price">
                        <span class="text-danger">@error('price') {{ $message }}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" class="input-file" src="" alt="" wire:model="image">
                        <span class="text-danger">@error('image') {{ $message }}@enderror</span>
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