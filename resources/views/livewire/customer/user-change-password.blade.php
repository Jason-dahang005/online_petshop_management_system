<div>

    <div class="card" maxWidth="50%">
        <div class="row">
            <div class="col-md-12">
                <div class="card-header">
                        Change Password
                    <div class="card-body" wire:click.prevent="changePassword">
                        @if (Session::has('password_success'))
                            <div class="alert alert-success" role="alert">{{ Session::get('password_success') }}</div>
                        @endif
                        @if (Session::has('password_error'))
                            <div class="alert alert-success" role="alert">{{ Session::get('password_error') }}</div>
                        @endif
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Current Password</label>
                                <div class="col-md-4">
                                    <input type="password" placeholder="Current Password" class="form-control input-md" wire:model="old_pass" name="old_pass">
                                    <span class="text-danger">@error('old_pass') {{ $message }}@enderror</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">New Password</label>
                                <div class="col-md-4">
                                    <input type="password" placeholder="New Password" class="form-control input-md" wire:model="password" name="password">
                                    <span class="text-danger">@error('password') {{ $message }}@enderror</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Confirm Password</label>
                                <div class="col-md-4">
                                    <input type="password" placeholder="Confirm Password" class="form-control input-md" wire:model="confirm_password" name="confirm_password">
                                    <span class="text-danger">@error('confirm_password') {{ $message }}@enderror</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
