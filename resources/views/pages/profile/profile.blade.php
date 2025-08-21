<x-app>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg rounded-4">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <img src="{{ $user->profile && $user->profile->profile_picture
                                ? asset('storage/' . $user->profile->profile_picture)
                                : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}"
                                class="rounded-circle shadow" width="120" height="120" alt="Profile Picture">
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
                            <a href="{{ route('profile.index') }}"
                                class="btn btn-secondary rounded-pill px-4">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>
