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


                        <!-- Tombol untuk buka modal -->
                        <div class="mt-3">
                            <button type="button" class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal"
                                data-bs-target="#editProfileModal">
                                Edit Profile
                            </button>
                            <a href="/dashboard" class="btn btn-secondary rounded-pill px-4">Kembali</a>
                        </div>

                        <!-- Modal Edit Profile -->
                        <div class="modal fade" id="editProfileModal" tabindex="-1"
                            aria-labelledby="editProfileModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content rounded-4 shadow">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editProfileModalLabel">Edit Profil</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Tutup"></button>
                                    </div>
                                    <form action="{{ route('profile.update', $user->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="modal-body">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label for="name" class="form-label">Nama</label>
                                                    <input type="text" name="name" class="form-control"
                                                        value="{{ old('name', $user->name) }}" required>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" name="email" class="form-control"
                                                        value="{{ old('email', $user->email) }}" required>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text" name="username" class="form-control"
                                                        value="{{ old('username', $user->profile->username ?? '') }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="phone" class="form-label">Telepon</label>
                                                    <input type="text" name="phone" class="form-control"
                                                        value="{{ old('phone', $user->profile->phone ?? '') }}">
                                                </div>

                                                <div class="col-12">
                                                    <label for="address" class="form-label">Alamat</label>
                                                    <textarea name="address" class="form-control" rows="2">{{ old('address', $user->profile->address ?? '') }}</textarea>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="date_of_birth" class="form-label">Tanggal
                                                        Lahir</label>
                                                    <input type="date" name="date_of_birth" class="form-control"
                                                        value="{{ old('date_of_birth', $user->profile->date_of_birth ?? '') }}">
                                                </div>

                                                <div class="col-12">
                                                    <label for="bio" class="form-label">Bio</label>
                                                    <textarea name="bio" class="form-control" rows="2">{{ old('bio', $user->profile->bio ?? '') }}</textarea>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="facebook" class="form-label">Facebook</label>
                                                    <input type="url" name="facebook" class="form-control"
                                                        value="{{ old('facebook', $user->profile->facebook ?? '') }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="twitter" class="form-label">Twitter</label>
                                                    <input type="url" name="twitter" class="form-control"
                                                        value="{{ old('twitter', $user->profile->twitter ?? '') }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="instagram" class="form-label">Instagram</label>
                                                    <input type="url" name="instagram" class="form-control"
                                                        value="{{ old('instagram', $user->profile->instagram ?? '') }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="linkedin" class="form-label">LinkedIn</label>
                                                    <input type="url" name="linkedin" class="form-control"
                                                        value="{{ old('linkedin', $user->profile->linkedin ?? '') }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="website" class="form-label">Website</label>
                                                    <input type="url" name="website" class="form-control"
                                                        value="{{ old('website', $user->profile->website ?? '') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary rounded-pill"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary rounded-pill">Simpan
                                                Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>
