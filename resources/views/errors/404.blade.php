<!DOCTYPE html>
<html>
<head>
    <title>403 Forbidden</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">

    <div class="text-center">
        <h1 class="display-1 fw-bold text-danger">404</h1>
        <h3 class="mb-3">404 Not Found</h3>

        <p class="text-muted">
            {{ $exception->getMessage() ?: 'You are not allowed to access this page.' }}
        </p>

        <a href="{{ url()->previous() }}" class="btn btn-dark">
            Go Back
        </a>
    </div>

</body>
</html>