<x-app>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>DataTable</h3>
                    <p class="text-subtitle text-muted">For user to check they list</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class='breadcrumb-header float-start float-lg-end'>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="m-0">Film</h5>
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
                                    <th style="width: 10%">No</th>
                                    <th style="width: 10%">Categori</th>
                                    <th style="width: 10%">Title</th>
                                    <th style="width: 10%">deskripsi</th>
                                    <th style="width: 10%">Image</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($films as $film)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $film->kategori->name }}</td>
                                        <td>{{ $film->title }}</td>
                                        <td>{{ $film->description }}</td>
                                        <td>
                                            @if ($film->image)
                                                <img src="{{ asset('storage/' . $film->image) }}"
                                                    alt="{{ $film->title }}" width="100">
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('film.update', $film->id) }}"
                                                    class="btn btn-sm btn-warning me-1">Edit</a>
                                                <form action="{{ route('film.destroy', $film->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
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
                    <h5 class="modal-title" id="myModalLabel1">Tambah Film</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <form class="form form-vertical" action="{{ route('film.store') }}" method="POST">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="validationCustom01">Kategori</label>
                                            <select id="validationCustom01" class="form-control" name="kategori_id">
                                                <option value="">Select Kategori</option>
                                                @foreach ($kategori as $kat)
                                                    <option value="{{ $kat->id }}">{{ $kat->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom01">Title</label>
                                            <input type="text" id="validationCustom01" class="form-control"
                                                name="title" placeholder="Title">
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom01">Description</label>
                                            <textarea id="validationCustom01" class="form-control"
                                                name="description" placeholder="description" rows="4"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom01">Image</label>
                                            <input type="file" id="validationCustom01" class="form-control"
                                                name="image">
                                        </div>

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
