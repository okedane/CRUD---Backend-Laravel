<x-app>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg rounded-4">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <form action="{{ route('profile.updatePhoto', $user->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <input type="file" name="profile_picture" id="profile_picture" class="d-none"
                                    accept="image/*" onchange="this.form.submit()">

                                <div class="position-relative d-inline-block" style="cursor: pointer;"
                                    onclick="document.getElementById('profile_picture').click();">
                                    {{-- Foto Profil --}}
                                    <img src="{{ $user->profile && $user->profile->profile_picture
                                        ? asset('storage/' . $user->profile->profile_picture)
                                        : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}"
                                        class="rounded-circle shadow" width="150" height="150"
                                        alt="Profile Picture">

                                    {{-- Ikon Kamera --}}
                                    <div class="camera-icon position-absolute">
                                        <i class="bi bi-camera-fill"></i>
                                    </div>
                                </div>
                            </form>
                            <div class="d-flex justify-content-center gap-3 mt-3">
                                @if ($user->profile && $user->profile->facebook)
                                    <a href="{{ $user->profile->facebook }}" target="_blank"
                                        class="text-decoration-none text-primary fs-4">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                @endif

                                @if ($user->profile && $user->profile->twitter)
                                    <a href="{{ $user->profile->twitter }}" target="_blank"
                                        class="text-decoration-none text-info fs-4">
                                        <i class="bi bi-twitter"></i>
                                    </a>
                                @endif

                                @if ($user->profile && $user->profile->instagram)
                                    <a href="{{ $user->profile->instagram }}" target="_blank"
                                        class="text-decoration-none text-danger fs-4">
                                        <i class="bi bi-instagram"></i>
                                    </a>
                                @endif

                                @if ($user->profile && $user->profile->linkedin)
                                    <a href="{{ $user->profile->linkedin }}" target="_blank"
                                        class="text-decoration-none text-primary fs-4">
                                        <i class="bi bi-linkedin"></i>
                                    </a>
                                @endif

                                @if ($user->profile && $user->profile->website)
                                    <a href="{{ $user->profile->website }}" target="_blank"
                                        class="text-decoration-none text-dark fs-4">
                                        <i class="bi bi-globe"></i>
                                    </a>
                                @endif
                            </div>

                        </div>
                        <h3 class="fw-bold">{{ $user->name }}</h3>
                        @if ($user->profile && $user->profile->username)
                            <p class="text-muted">@ {{ $user->profile->username }}</p>
                        @endif
                        <table class="table table-borderless text-start mt-4">
                            <tr>
                                <th>Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td>{{ $user->profile->phone ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ $user->profile->address ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>{{ $user->profile->date_of_birth ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Bio</th>
                                <td>{{ $user->profile->bio ?? '-' }}</td>
                            </tr>
                        </table>


                        <div class="mt-3">
                            <a href="#" class="btn btn-primary rounded-pill px-4">Edit Profile</a>
                            <a href="/dashboard" class="btn btn-secondary rounded-pill px-4">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>
