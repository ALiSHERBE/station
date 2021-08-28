<div class="row">
    <div class="col-md-12">
        <div class="py-4 text-center">
            <h2>Рейс: <?php echo $flight['departure'] ?> - <?php echo $flight['destination'] ?></h2>
            <p class="lead text-center"><?php echo $flight['departure_time'] ?></p>
        </div>
        <table class="table table-bordered mb-5">
            <tbody>
            <tr>
                <th>Время отправления</th>
                <td><?php echo $flight['departure_time'] ?></td>
                <th>Время в пути, ч:м</th>
                <td><?php echo $flight['travel_time'] ?></td>
            </tr>
            <tr>
                <th>Время прибытия</th>
                <td><?php echo $flight['arrival_time'] ?></td>
                <th>Число мест</th>
                <td><?php echo $flight['number_seats'] ?></td>
            </tr>
            <tr>
                <th>Марка автобуса</th>
                <td><?php echo $flight['brand'] ?></td>
                <th>Номер</th>
                <td><?php echo $flight['number'] ?></td>
            </tr>
            <tr>
                <th>Водитель</th>
                <td><?php echo $flight['driver'] ?></td>
                <th>Цена</th>
                <td><?php echo $flight['ticket_price'] ?> руб.</td>
            </tr>
            </tbody>
        </table>
	    <?php if (isset($userdata['user_login'])):?>
        <form action="/acquire.php" method="post">
            <input type="hidden" value="<?php echo $flight['id_flight'] ?>" name="id_flight">
            <div class="row">
                <div class="col-sm-12">
                    <button name="btn_apply" class="w-100 btn btn-danger" type="submit">Купить</button>
                </div>
            </div>
        </form>
	    <?php else:?>
            <p class="text-center">Для совершения покупки, пожалуйста авторизуйтесь</p>
            <div class="text-center">
                <a href="/login.php" class="btn btn-primary me-2 ">Авторизация</a>
            </div>
	    <?php endif?>
    </div>
</div>