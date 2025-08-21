<x-app>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Users</h3>
                    <p class="text-subtitle text-muted">For user to check they list</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class='breadcrumb-header float-start float-lg-end'>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Users</li>
                        </ol>
                    </nav>  
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="m-0">Users</h5>
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                        data-bs-target="#default">
                        Create
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class='table table-striped w-100'>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <button type="button" class="btn btn-warning me-2"
                                                    data-bs-toggle="modal" data-bs-target="#update{{ $user->id }}">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </button>

                                                <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                                    id="deleteForm{{ $user->id }}" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $user->id }}">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </form>

                                                <div class="modal fade" id="deleteModal{{ $user->id }}"
                                                    tabindex="-1" aria-labelledby="deleteModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel">
                                                                    Konfirmasi
                                                                    Penghapusan</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin menghapus jabatan
                                                                <strong>{{ $user->name }}</strong>?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <button type="button" class="btn btn-danger"
                                                                    onclick="document.getElementById('deleteForm{{ $user->id }}').submit();">Hapus</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>


                                    <div class="modal fade text-left" id="update{{ $user->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel1">Update User</h5>
                                                    <button type="button" class="close rounded-pill"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card-body">
                                                        <form class="form form-vertical"
                                                            action="{{ route('user.update', $user->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label for="validationCustom01">Name</label>
                                                                            <input type="text"
                                                                                id="validationCustom01"
                                                                                class="form-control" name="name"
                                                                                placeholder="Name"
                                                                                value="{{ $user->name }}">
                                                                            <div class="invalid-feedback">Please enter a
                                                                                name.</div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="validationCustom02">Email</label>
                                                                            <input type="email"
                                                                                id="validationCustom02"
                                                                                class="form-control" name="email"
                                                                                placeholder="Email"
                                                                                value="{{ $user->email }}">
                                                                            <div class="invalid-feedback">Please enter
                                                                                a valid email.</div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="validationCustom03">Password</label>
                                                                            <input type="password"
                                                                                id="validationCustom03"
                                                                                class="form-control" name="password"
                                                                                placeholder="Password">
                                                                            <div class="invalid-feedback">Please enter
                                                                                a password.</div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary ml-1">Accept</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>
    </div>


    <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Tambah Users</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <form class="form form-vertical" action="{{ route('user.store') }}" method="POST">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="validationCustom01">Name</label>
                                            <input type="text" id="validationCustom01"   class="form-control"
                                                name="name" placeholder="Name">
                                            <div class="invalid-feedback">Please enter a name.</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom02">Email</label>
                                            <input type="email" id="validationCustom02" class="form-control"
                                                name="email" placeholder="Email">
                                            <div class="invalid-feedback">Please enter a valid email.</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom03">Password</label>
                                            <input type="password" id="validationCustom03" class="form-control"
                                                name="password" placeholder="Password">
                                            <div class="invalid-feedback">Please enter a password.</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom04">Confirm Password</label>
                                            <input type="password" id="validationCustom04" class="form-control"
                                                name="password_confirmation" placeholder="Confirm Password">
                                            <div class="invalid-feedback">Please confirm your password.</div>
                                        </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary ml-1">Accept</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app>
