<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="{{ asset('storage/images/application/siteicon.png') }}">
    <title>@yield('title') | Scout Beyond</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/jquery.toast.min.css') }}">
    <script src="{{ asset('js/jquery.toast.min.js') }}"></script>

    <style type="text/css">
        html {
            width: 100%;
            height: 100%;
        }

        body {
            background: linear-gradient(45deg, rgba(66, 183, 245, 0.8) 0%, rgba(66, 245, 189, 0.4) 100%);
            color: rgba(0, 0, 0, 0.6);
            font-family: "Roboto", sans-serif;
            font-size: 14px;
            line-height: 1.6em;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .overlay, .form-panel.one:before {
            position: absolute;
            top: 0;
            left: 0;
            display: none;
            background: rgba(0, 0, 0, 0.8);
            width: 100%;
            height: 100%;
        }

        .form {
            z-index: 15;
            position: relative;
            background: #FFFFFF;
            width: 600px;
            border-radius: 4px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            margin: 100px auto 10px;
            overflow: hidden;
        }

        .form-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 0 0 20px;
        }
        .form-group:last-child {
            margin: 0;
        }
        .form-group label {
            display: block;
            margin: 0 0 10px;
            color: rgba(0, 0, 0, 0.6);
            font-size: 12px;
            font-weight: 500;
            line-height: 1;
            text-transform: uppercase;
            letter-spacing: 0.2em;
        }

        .form-group input {
            outline: none;
            display: block;
            background: rgba(0, 0, 0, 0.1);
            width: 100%;
            border: 0;
            border-radius: 4px;
            box-sizing: border-box;
            padding: 12px 20px;
            color: rgba(0, 0, 0, 0.6);
            font-family: inherit;
            font-size: inherit;
            font-weight: 500;
            line-height: inherit;
            transition: 0.3s ease;
        }
        .form-group input:focus {
            color: rgba(0, 0, 0, 0.8);
        }

        .form-group button {
            outline: none;
            background: #4285F4;
            width: 100%;
            border: 0;
            border-radius: 4px;
            padding: 12px 20px;
            color: #FFFFFF;
            font-family: inherit;
            font-size: inherit;
            font-weight: 500;
            line-height: inherit;
            text-transform: uppercase;
            cursor: pointer;
        }

        .form-group .form-remember {
            font-size: 12px;
            font-weight: 400;
            letter-spacing: 0;
            text-transform: none;
        }
        .form-group .form-remember input[type=checkbox] {
            display: inline-block;
            width: auto;
            margin: 0 10px 0 0;
        }
        .form-group .form-recovery {
            color: #4285F4;
            font-size: 12px;
            text-decoration: none;
        }
        .form-panel {
            padding: 60px;
            box-sizing: border-box;
        }
        .form-panel.one:before {
            content: "";
            display: block;
            opacity: 0;
            visibility: hidden;
            transition: 0.3s ease;
        }
        .form-panel.one.hidden:before {
            display: block;
            opacity: 1;
            visibility: visible;
        }

        .form-header {
            margin: 0 0 40px;
        }
        .form-header h1 {
            padding: 4px 0;
            color: #4285F4;
            font-size: 24px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .form-control:disabled, .form-control[readonly] {
            background-color: rgba(255, 83, 168, 0);
            opacity: 1;
        }

    </style>
</head>
<body>


@yield('content')
</body>
</html>








