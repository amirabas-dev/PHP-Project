<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notification</title>
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
  <div class="container py-5">
    <div class="card shadow-sm">
      <div class="card-body">
        <h3 class="card-title mb-3">{{ $notification['title'] }}</h3>
        <p class="card-text">{{ $notification['message'] }}</p>
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Back to Dashboard</a>
      </div>
    </div>
  </div>
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
