<div>
    <div class="row">
        <div class="card">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="card-header">
                    <h2 class="box-title">Leave a Message</h2>
                </div>
                    <div class="card-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                    <form action="" wire:click.prevent="sendMessage">
                        <div class="form-control">
                            <label for="">Name<span>*</span></label>
                            <input type="text" name="name" id="name" wire:model="name">
                            @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                        </div>

                        <div class="form-control">
                            <label for="">Email<span>*</span></label>
                            <input type="email" name="email" id="email" wire:model="email">
                            @error('email')<p class="text-danger">{{ $message }}</p>@enderror
                        </div>
                       
                        <div class="form-control">
                            <label for="">Phone Number<span>*</span></label>
                            <input type="text" name="phone" id="phone" wire:model="phone">
                            @error('phone')<p class="text-danger">{{ $message }}</p>@enderror
                        </div>

                         <div class="form-control">
                            <label for="">Comment<span>*</span></label>
                            <textarea name="comment" id="comment" wire:model="comment"></textarea>
                            @error('comment')<p class="text-danger">{{ $message }}</p>@enderror
                         </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    </div>
            </div>
        </div>
    </div>
</div>
