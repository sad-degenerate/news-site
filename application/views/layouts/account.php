<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title; ?></title>
    <link href="/public/styles/bootstrap.css" rel="stylesheet">
    <link href="/public/styles/admin.css" rel="stylesheet">
    <link href="/public/styles/font-awesome.css" rel="stylesheet">
    <script src="/public/scripts/jquery.js"></script>
    <script src="/public/scripts/form.js"></script>
    <script src="/public/scripts/popper.js"></script>
    <script src="/public/scripts/bootstrap.js"></script>
</head>
<body class="fixed-nav sticky-footer bg-dark">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        <i class="fa fa-fw fa-sign-out"></i>
                        <span class="nav-link-text">На главную</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
<?php echo $content; ?>
</body>
</html>