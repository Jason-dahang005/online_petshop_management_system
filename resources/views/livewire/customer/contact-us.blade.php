<div>
    <div class="container">
        <div class="card my-5">
            <div class="card-header">
                <h2 class="box-title">Leave a Message</h2>
            </div>
            <div class="card-body">
                @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                @endif
            <form >
                <div class="pt-3">
                    <label for="">Name<span>*</span></label>
                    <input type="text"  class="form-control" id="name" wire:model="name" placeholder="Enter name">
                    <span class="text-danger">@error('name') {{ $message }}@enderror</span>
                </div>

                <div class="pt-3">
                    <label for="">Email<span>*</span></label>
                    <input type="email" " class="form-control" id="email" wire:model="email" placeholder="Enter email">
                    <span class="text-danger">@error('email') {{ $message }}@enderror</span>
                </div>
                
                <div class="pt-3">
                    <label for="">Phone Number<span>*</span></label>
                    <input type="text" " class="form-control" id="phone" wire:model="phone" placeholder="Enter mobile number">
                    <span class="text-danger">@error('phone') {{ $message }}@enderror</span>
                </div>

                    <div class="pt-3">
                    <label for="">Comment<span>*</span></label>
                    <textarea class="form-control" rows="5" id="comment" wire:model="comment" placeholder="Enter comment"></textarea>
                    <span class="text-danger">@error('comment') {{ $message }}@enderror</span>
                    </div>

                    <div class="pt-3">
                    <button wire:click.prevent="sendMessage" class="btn btn-primary w-100">Submit</button>
                    </div>
            </form>
        </div>
    </div>
</div>
