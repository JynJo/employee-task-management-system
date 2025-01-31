<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centered Login Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles for full-height centering */
        html, body {
            height: 100%;
        }
        .container-center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
    </style>
</head>
<body>
    <div class="container-center">
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <div class="card-header text-center">
                  <a class="h4">Login</a>
                </div>
                <div class="card-body">
                    @if($errors->has('email'))
                        {{ $errors->first('email') }}
                    @endif   

                    <form
                        action='{{ route('authenticate') }}'
                        method='POST'
                    >
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label" style='font-size: 16px;'>Email</label> <!-- Small text size -->
                            <input name='email' type="email" class="form-control form-control-md" id="email" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label fs-6">Password</label> <!-- Small text size -->
                            <input name='password' type="password" class="form-control form-control-md" id="password" placeholder="Enter your password" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-md">Login</button> <!-- Small button -->
                        </div>
                       {{--  <div class="text-center mt-3">
                            <a href="#" class="text-decoration-none fs-6">Forgot password?</a> <!-- Small text size -->
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>