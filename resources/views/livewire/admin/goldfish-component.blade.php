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
          <table class="table table-striped table-sm table-bordered">
            <thead>
              <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Description</th>
                <th>Price</th>
                <th>Status</th>
                <th>Date Added</th>
                <th colspan="1">Action</th>
              </tr>
            </thead>
            <tbody>
                @if (count($goldF) > 0)
                  @foreach ($goldF as $fish)
                    <tr>
                      <td style="width: 14%">{{ $fish->name }}</td>
                      <td style="width: 10%"><img src="{{ asset('/images/image') }}/{{ $fish->image }}" alt="" style="max-width: 50px"></td>
                      <td style="width: 40%">{{ $fish->description }}</td>
                      <td style="width: 8%">₱{{ $fish->price }}</td>
                      <td style="width: 5%">
                        @if ($fish->status)
                          <span class="badge badge-success">Active</span>
                        @else
                          <span class="badge badge-danger">Inactive</span>
                        @endif
                      </td>
                      <td style="width: 10%">{{ date('M d,Y', strtotime($fish->created_at)) }}</td>
                      <td style="width: 13%">
                        <button class="btn btn-xs btn-success" wire:click="OpenViewGoldfishModal({{ $fish->id }})"><i class="fas fa-eye"></i> View</button>
                        <button class="btn btn-xs btn-primary" wire:click="OpenEditGoldfishModal({{ $fish->id }})"><i class="fas fa-edit"></i> Update</button>
                      </td>
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="8">
                      <h4 class="text-center py-3">Table is empty</h4>
                    </td>
                  </tr>
                @endif
            </tbody>
          </table>
          <hr>
          <div class="d-flex justify-content-end">
            
          </div>
        </div>
    </div>


    {{-- MODALS --}}

    {{-- Open Create Modal --}}
    <div class="modal fade" wire:ignore.self id="OpenGoldfishModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h5 class="modal-title w-100" id="exampleModalLabel">ADD NEW GOLDFISH</h5>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" wire:submit.prevent="addGoldfish">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" placeholder="Enter Name" wire:model="name" wire:keyup="generateslug">
                        <span class="text-danger">@error('name') {{ $message }}@enderror</span>
                    </div>

                    <div class="form-group">
                        {{-- <label for="">Slug</label> --}}
                        <input type="hidden" class="form-control" placeholder="Enter Name" wire:model="slug">
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea  class="form-control" cols="30" rows="5" placeholder="Enter Name" wire:model="description"></textarea>
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
          </div>
        </div>
    </div>

    {{-- Open Edit Modal --}}
    <div class="modal fade" wire:ignore.self id="OpenEditGoldfishModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h5 class="modal-title w-100" id="exampleModalLabel">UPDATE GOLDFISH</h5>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" wire:submit.prevent="updateGoldfish">
                 
                <input type="hidden" wire:model="upd_id">
                <div class="form-group">
                      <label for="">Name</label>
                      <input type="text" class="form-control" placeholder="Enter Name" wire:model="upd_name" wire:keyup="generateeditslug">
                      <span class="text-danger">@error('upd_name') {{ $message }}@enderror</span>
                  </div>

                  <div class="form-group">
                      {{-- <label for="">Slug</label> --}}
                      <input type="hidden" class="form-control" placeholder="Enter Name" wire:model="upd_slug">
                  </div>

                  <div class="form-group">
                      <label for="">Description</label>
                      <input type="text" class="form-control" placeholder="Enter Name" wire:model="upd_description">
                      <span class="text-danger">@error('upd_description') {{ $message }}@enderror</span>
                  </div>

                  <div class="form-group">
                      <label for="">Price</label>
                      <input type="text" class="form-control" placeholder="Enter Name" wire:model="upd_price">
                      <span class="text-danger">@error('upd_price') {{ $message }}@enderror</span>
                  </div>

                  <div class="form-group">
                      <label for="">Image</label>
                      <input type="file" class="form-control" wire:model="upd_image">
                        @if ($upd_image)
                          <img class="text-center pt-1" src="{{ $upd_image->temporaryUrl() }}" width="100" class="input-file">
                        @else
                          <img class="text-center pt-1" src="{{ asset('/images/image') }}/{{ $image }}" width="120" alt="">
                        @endif
                      <span class="text-danger">@error('upd_image') {{ $message }}@enderror</span>
                  </div>

                  <div class="form-group">
                    <label for="">Status</label>
                    <select class="custom-select" wire:model="status">
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
                    <span class="text-danger">@error('upd_status') {{ $message }} @enderror</span>
                  </div>
              
                  </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Update</button>
                  </div>
              </form>
        </div>
      </div>
  </div>

  {{-- Open View Modal --}}
  <div class="modal fade" wire:ignore.self id="OpenViewGoldfishModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class="modal-title w-100" id="exampleModalLabel">GOLDFISH DETAILS</h5>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" >
               
              <input type="hidden" wire:model="id">
              <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" disabled class="form-control" placeholder="Enter Name" wire:model="name" wire:keyup="generateeditslug">
                </div>

                <div class="form-group">
                    {{-- <label for="">Slug</label> --}}
                    <input type="hidden" disabled class="form-control" placeholder="Enter Name" wire:model="slug">
                </div>

                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" disabled class="form-control" placeholder="Enter Name" wire:model="description">
                    
                </div>

                <div class="form-group">
                    <label for="">Price</label>
                    <input type="text" disabled class="form-control" placeholder="Enter Name" wire:model="price">
                </div>

                <div class="form-group">
                    <label for="">Image</label>
                    <img class="text-center pt-1" src="{{ asset('/images/image') }}/{{ $image }}" width="120" alt="">
                </div>

                <div class="form-group">
                  <label for="">Status</label>
                  <select class="custom-select" disabled wire:model="status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                  </select>
                </div>
            
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
      </div>
    </div>
</div>

</div>