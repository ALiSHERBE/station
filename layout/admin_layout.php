<html lang="ru">
<head>
    <meta charset="utf-8">
    <title><?= $pageTitle ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="/css/select2.min.css" rel="stylesheet">
</head>
<body>

<div id="page">
    <div class="container">
        <header class="p-3">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-decoration-none">
                        <img src="/images/station.svg" alt="Station" height="32px" width="40px"/>
                    </a>

                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="/" class="nav-link px-2 link-dark">Главная</a></li>
                        <li><a href="/admin.php" class="nav-link px-2 link-dark active">Пункты назначения</a></li>
                        <li><a href="/admin/routes.php" class="nav-link px-2 link-dark">Маршруты</a></li>
                        <li><a href="/admin/buses.php" class="nav-link px-2 link-dark">Автобусы</a></li>
                        <li><a href="/admin/stops.php" class="nav-link px-2 link-dark">Остановки</a></li>
                        <li><a href="/admin/flights.php" class="nav-link px-2 link-dark">Рейсы</a></li>
                    </ul>
                    <div class="dropdown text-end">
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/images/user.jpg" alt="mdo" width="32" height="32" class="rounded-circle">
                            Привет, <?php echo $userdata['first_name']?>
                        </a>

                        <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
                            <li><a class="dropdown-item" href="/admin.php">Админка</a></li>

                            <li><a class="dropdown-item" href="/my_tickets.php">Мои билеты</a></li>
                            <li><a class="dropdown-item" href="/profile.php">Профиль</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/logout.php">Выйти</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
		<?php include $tpl ?>
    </div>
</div>

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap-datepicker.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/autocomplete.js"></script>
<script src="/js/jquery.inputmask.js"></script>
<script src="/js/select2.min.js"></script>

<style>
    .select2-selection__rendered {
        line-height: 38px !important;
    }
    .select2-container .select2-selection--single {
        height: 38px !important;
    }
    .select2-selection__arrow {
        height: 38px !important;
    }
</style>

</body>
</html>