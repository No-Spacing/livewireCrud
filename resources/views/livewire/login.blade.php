<div class="card container mt-2 w-25"> 
    <div class="card-body">
        <div class="d-flex justify-content-center mb-3">
            <img class="w-75" src="img/laravel-livewire.jpeg"/>
        </div>
        <h5 class="card-title mb-3">
            Login
        </h5>
        @if(Session::has('fail'))
            <div class="text-center alert alert-danger">
                    {{ Session::get('fail') }}
            </div>
        @endif
        <form wire:submit="login">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                @error('email') <span class="text-danger ">{{ $message }}</span> @enderror
                <input type="email" wire:model="email" class="form-control" id="email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                <input type="password" wire:model="password" class="form-control" id="password"/>      
                <a href="/#">Forgot password?</a>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Login</button>
                <div class="my-1 text-center">
                    <hr></hr>
                    <span>or</span>
                    <hr></hr>
                </div>
                <a href="/register" class="btn btn-outline-primary mb-3">Create Account</a>
            </div>
        </form>
    </div>
</div>
