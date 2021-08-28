<div class="row">
    <div class="col-md-12">
        <div class="py-4 text-center">
            <h2>Результаты поиска</h2>
        </div>
        <form action="/search_ticket.php" method="post">
            <div class="row">
                <div class="col-sm-12 col-xl-4 col-lg-6">
                    <label for="from" class="form-label">Откуда</label>
                    <input class="form-control hg-38 " type="text" autocomplete="off" name="from" placeholder="например Ставрополь" id="from" value="<?php echo $from?>">
                </div>
                <div class="col-sm-12 col-xl-4 col-lg-6">
                    <label for="to" class="form-label">Куда</label>
                    <input class="form-control hg-38 " type="text" autocomplete="off" name="to" placeholder="например Москва" id="to" value="<?php echo $to?>">
                </div>
                <div class="col-sm-12 col-xl-2 col-lg-6">
                    <label for="date" class="form-label">Дата</label>
                    <input type="text" class="form-control datepicker hg-38" id="date" name="date"
                           placeholder="<?php echo date('d.m.Y'); ?>" value="<?php echo $date?>" required="" autocomplete="off">
                </div>
                <div class="col-sm-12 col-xl-2 col-lg-6 d-flex align-items-end">
                    <button name="btn_apply" class="w-100 btn btn-primary " type="submit">Найти</button>
                </div>
            </div>
        </form>

        <div>
            <h3>Маршруты и рейсы</h3>
            <?php if (empty($flights)):?>
                <p>К сожалению, по Вашему запросу маршруты не найдены</p>
            <?php else:?>
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th scope="col">Время отправления</th>
                        <th scope="col">Пункт отправления</th>
                        <th scope="col">Пункт назначения</th>
                        <th scope="col">Дни движ</th>
                        <th scope="col">В пути, ч:м</th>
                        <th scope="col">Время прибытия</th>
                        <th scope="col">Автобус</th>
                        <th scope="col">Цена билета</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
		            <? foreach ($flights as $key => $value): ?>
                        <tr>
                            <th><?php echo $value['departure_time'] ?></th>
                            <td><?php echo $value['departure'] ?></td>
                            <td><?php echo $value['destination'] ?></td>
                            <td><?php echo $value['day'] ?></td>
                            <td><?php echo $value['travel_time'] ?></td>
                            <td><?php echo $value['arrival_time'] ?></td>
                            <td><?php echo $value['brand'] ?>, <?php echo $value['number'] ?></td>
                            <td><?php echo $value['ticket_price'] ?></td>
                            <td><a href="/buy.php?f=<?php echo $value['id_flight'] ?>" class="btn btn-outline-primary">купить</a></td>
                        </tr>
		            <? endforeach; ?>
                    </tbody>
                </table>
            <?php endif?>
        </div>
    </div>
</div>
<link href="/css/bootstrap-datepicker.min.css" rel="stylesheet">
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap-datepicker.min.js"></script>


<style>
    .hg-38 {
        height: 38px;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        $('.datepicker').datepicker({
            orientation: 'bottom',
            format: 'dd.mm.yyyy',
            weekStart: 1,
            todayHighlight: true,
            autoclose: true,
        });
    });

    var datasrc = [
		<?foreach($destinations as $key => $value):?>
        {label: '<?php echo $value['destination']?>', value: '<?php echo $value['destination']?>'},
		<?endforeach;?>
    ]
    document.addEventListener('DOMContentLoaded', function(){
        new Autocomplete(document.getElementById('from'), {
            data: datasrc,
            treshold: 1,
            maximumItems: 10,
        });

        new Autocomplete(document.getElementById('to'), {
            data: datasrc,
            treshold: 1,
            maximumItems: 10,
        });
    });
</script>