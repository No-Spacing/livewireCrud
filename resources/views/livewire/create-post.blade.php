<div class="container pt-5">
    <form wire:submit="save">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror 
            <input type="text" class="form-control" id="name" wire:model="name" placeholder="Juan Dela Cruz">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror 
            <input type="email" class="form-control" id="exampleFormControlInput1" wire:model="email" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="bdate" class="form-label">Birthdate</label>
            @error('bdate') <span class="text-danger">{{ $message }}</span> @enderror 
            <input type="date" class="form-control" id="bdate" wire:model="bdate">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Birthdate</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($persons as $key=>$person)
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                    <td>{{ $person->name }}</td>
                    <td>{{ $person->email }}</td>
                    <td>{{ $person->bdate }}</td>
                    <td>

                        <a 
                            class="btn btn-danger"
                            wire:click="delete({{ $person->id }})"
                            wire:confirm="Are you sure you want to delete this person?">
                            <i class="bi bi-trash3"> Delete</i>
                        </a>

                        <button 
                            type="button" 
                            class="btn btn-info" 
                            data-bs-toggle="modal" 
                            data-bs-target="#exampleModal" 
                            wire:click="updateId({{ $person->id }})">
                            <i class="bi bi-pencil-square"> Update</i>
                        </button>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Info</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <form wire:submit="update">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Name</label>
                                @error('uname') <span class="text-danger">{{ $message }}</span> @enderror 
                                <input type="text" class="form-control" id="recipient-name" wire:model="uname">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-bdate" class="col-form-label">Birthdate</label>
                                <input type="date" class="form-control" id="recipient-bdate" wire:model="ubdate">
                            </div> 
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
