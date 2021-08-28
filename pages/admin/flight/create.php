<div class="row">
	<div class="col-md-12">
		<div class="py-4 text-center">
			<h2>Добавление рейса</h2>
		</div>

		<form method="POST" action="/admin/insert.php">
			<input type="hidden" value="flights" name="table">
			<div class="row">
                <div class="col-12 mb-3">
                    <label for="departure_time" class="form-label">Время отправления</label>
                    <input class="form-control" type="text" name="departure_time" id="departure_time" required>
                </div>

                <div class="col-12 mb-3">
                    <label for="arrival_time" class="form-label">Время прибытия</label>
                    <input class="form-control" type="text" name="arrival_time" id="arrival_time" required>
                </div>

                <div class="col-12 mb-3">
                    <label for="id_route" class="form-label">Маршрут</label>
                    <select name="id_route" class="form-control">
	                    <?foreach($routes as $key => $value):?>
                            <option value="<?php echo $value['id_route'] ?>"><?php echo $value['departure'] ?> - <?php echo $value['destination'] ?></option>
	                    <?endforeach;?>
                    </select>
                </div>

                <div class="col-12 mb-3">
                    <label for="id_bus" class="form-label">Автобус</label>
                    <select name="id_bus" class="form-control s2">
						<?foreach($buses as $key => $value):?>
                            <option value="<?php echo $value['id_bus'] ?>"><?php echo $value['brand'] ?></option>
						<?endforeach;?>
                    </select>
                </div>

                <div class="col-12 mb-3">
                    <label for="ticket_price" class="form-label">Цена</label>
                    <input class="form-control" type="text" name="ticket_price" id="ticket_price" required>
                </div>

				<div class="col-12">
					<input class="w-100 btn btn-primary btn-lg" name="submit" type="submit" value="Добавить">
				</div>
			</div>
		</form>
	</div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        $('.s2').select2();
        $("#departure_time").inputmask("99:99",{ "placeholder": "чч-мм" });
        $("#arrival_time").inputmask("99:99",{ "placeholder": "чч-мм" });
    });
</script>