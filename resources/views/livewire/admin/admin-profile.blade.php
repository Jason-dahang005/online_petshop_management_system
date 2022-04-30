<div>
    
    <div class="row-md-3">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                   <img src="{{ asset('adminLTE/dist/img/user2-160x160.jpg') }}" alt="" class="profile-user-img img-fluid img-circle">
                </div>
                <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                <p class="text-muted text-center">Admin</p>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header text-center">
            <label class="">User Details</label>
        </div>
        <div class="card-body">
            @foreach ($admin as $object )
            <div class="row">
                <div class="col-6">Name</div>
                <div class="col-6">{{ $object->name }}</div>
                <div class="col-6">Email</div>
                <div class="col-6">{{ $object->email }}</div>
            
            </div>
            @endforeach
        </div>
    </div>    
                   
    <div class="card">
        <div class="card-header text-center">
            <label>Change Password</label>
        </div>
        <div class="card-body">
            @if (Session::has('password_success'))
            <div class="alert alert-success" role="alert">{{ Session::get('password_success') }}</div>
        @endif
        @if (Session::has('password_error'))
            <div class="alert alert-success" role="alert">{{ Session::get('password_error') }}</div>
        @endif
        <form  class="form-group"  wire:submit.prevent="changePassword">
        <div class="row">
            <label class="col-6">Current Password</label>
            <div class="col-6">
            <input type="password" placeholder="Current Password" class="form-control input-md" wire:model="old_pass" name="old_pass">
                        <span class="text-danger">@error('old_pass') {{ $message }}@enderror</span>
             </div>
        
             <label class="col-6">New Password</label>
                <div class="col-6">
                    <input type="password" placeholder="New Password" class="form-control input-md" wire:model="password" name="password">
                    <span class="text-danger">@error('password') {{ $message }}@enderror</span>
                </div>
        
            <label class="col-6">Confirm Password</label>
                <div class="col-6">
                    <input type="password" placeholder="Confirm Password" class="form-control input-md" wire:model="confirm_password" name="confirm_password">
                    <span class="text-danger">@error('confirm_password') {{ $message }}@enderror</span>
                </div>
               <label for="" class="col-6 py-2"></label>
                <button type="submit" class="btn btn-primary btn-block " >Submit</button>
                
        </div>
        </form>
        </div>
    </div>
    
    </div>
    
