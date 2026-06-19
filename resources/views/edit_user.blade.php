<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="adminHMD professional admin dashboard template">
  <title>Edit User | adminHMD</title>

  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
  <div class="admin-shell">
    <!-- Sidebar omitted for brevity; reuse same sidebar as other views if needed -->

    <div class="admin-main">
      <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
          <div class="page-heading">
            <div class="page-heading-copy">
              <span class="page-icon"><i class="bi bi-person-plus" aria-hidden="true"></i></span>
              <div>
                <p class="eyebrow mb-1">Management</p>
                <h1 class="h3 mb-1">Edit User</h1>
                <p class="text-muted mb-0">Update account information and role assignments.</p>
              </div>
            </div>
            <div class="heading-actions"><a class="btn btn-outline-secondary btn-sm" href="{{ route('users.index') }}"><i class="bi bi-arrow-left" aria-hidden="true"></i> Back to Users</a></div>
          </div>

          <section class="row g-3">
            <div class="col-12 col-xl-8">
              @php
                $names = explode(' ', $user->name ?? '');
                $first = $names[0] ?? '';
                $last = count($names) > 1 ? implode(' ', array_slice($names, 1)) : '';
              @endphp
              <form class="panel needs-validation" action="{{ route('users.update', $user->id) }}" method="POST" novalidate>
                @csrf
                <div class="panel-header"><div><h2 class="h5 mb-1 section-title"><i class="bi bi-person-plus" aria-hidden="true"></i><span>User Information</span></h2><p class="text-muted mb-0">Edit a user account.</p></div></div>
                <div class="row g-3">
                  <div class="col-md-6"><label class="form-label" for="firstName">First name</label><input class="form-control" id="firstName" name="first_name" type="text" value="{{ old('first_name', $first) }}" required><div class="invalid-feedback">First name is required.</div></div>
                  <div class="col-md-6"><label class="form-label" for="lastName">Last name</label><input class="form-control" id="lastName" name="last_name" type="text" value="{{ old('last_name', $last) }}" required><div class="invalid-feedback">Last name is required.</div></div>
                  <div class="col-md-6"><label class="form-label" for="email">Email</label><input class="form-control" id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required><div class="invalid-feedback">Enter a valid email.</div></div>
                  <div class="col-md-6"><label class="form-label" for="phone">Phone</label><input class="form-control" id="phone" name="phone" type="tel" value="{{ old('phone', $user->phone) }}"><div class="invalid-feedback">Phone number is required.</div></div>
                  <div class="col-md-6"><label class="form-label" for="role">Role</label><select class="form-select" id="role" name="role" required><option value="">Choose role</option><option {{ (old('role', $user->role) === 'Admin') ? 'selected' : '' }}>Admin</option><option {{ (old('role', $user->role) === 'Manager') ? 'selected' : '' }}>Manager</option><option {{ (old('role', $user->role) === 'Editor') ? 'selected' : '' }}>Editor</option><option {{ (old('role', $user->role) === 'Viewer') ? 'selected' : '' }}>Viewer</option></select><div class="invalid-feedback">Choose a role.</div></div>
                  <div class="col-md-6"><label class="form-label" for="team">Team</label><select class="form-select" id="team" name="team"><option value="">Choose team</option><option {{ (old('team', $user->team) === 'Operations') ? 'selected' : '' }}>Operations</option><option {{ (old('team', $user->team) === 'Sales') ? 'selected' : '' }}>Sales</option><option {{ (old('team', $user->team) === 'Content') ? 'selected' : '' }}>Content</option><option {{ (old('team', $user->team) === 'Finance') ? 'selected' : '' }}>Finance</option></select><div class="invalid-feedback">Choose a team.</div></div>
                </div>
                <div class="d-flex flex-wrap justify-content-end gap-2 mt-4"><a class="btn btn-outline-secondary" href="{{ route('users.show', $user->id) }}">Cancel</a><button class="btn btn-primary" type="submit"><i class="bi bi-person-check" aria-hidden="true"></i> Update User</button></div>
              </form>
            </div>
            <div class="col-12 col-xl-4">
              <div class="panel h-100">
                <h2 class="h5 mb-3 section-title"><i class="bi bi-list-check" aria-hidden="true"></i><span>Access Checklist</span></h2>
                <div class="activity-list">
                  <div class="activity-item"><span class="activity-dot bg-success"></span><div><p class="mb-1 fw-semibold">Assign role</p><p class="text-muted small mb-0">Start with the least privileged role.</p></div></div>
                  <div class="activity-item"><span class="activity-dot bg-primary"></span><div><p class="mb-1 fw-semibold">Add team</p><p class="text-muted small mb-0">Team ownership controls dashboards.</p></div></div>
                  <div class="activity-item"><span class="activity-dot bg-warning"></span><div><p class="mb-1 fw-semibold">Send invite</p><p class="text-muted small mb-0">Users receive activation by email.</p></div></div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </main>

      <footer class="admin-footer">
        <div class="container-fluid px-3 px-lg-4">
          <span>Copyright 2026 adminHMD. <br> Developed by <a target="_blank" class="fw-bold text-success" href="https://github.com/HasanMahmudDev">Md. Hasan Mahmud</a> • Distributed by <a target="_blank" class="fw-bold text-success" href="https://themewagon.com">ThemeWagon</a> </span>
          <span>Professional dashboard template.</span>
          <span>Validated user edit form.</span>
        </div>
      </footer>
    </div>
  </div>

  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
