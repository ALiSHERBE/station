<div class="row">
	<div class="col-md-12">
		<div class="py-4 text-center">
			<h2>Добавление маршрута</h2>
		</div>

		<form method="POST" action="/admin/insert.php">
			<input type="hidden" value="routes" name="table">
			<div class="row">
				<div class="col-12 mb-3">
					<label for="departure" class="form-label">пункт отправления</label>
					<input class="form-control" type="text" name="departure" id="departure" required>
				</div>

                <div class="col-12 mb-3">
                    <label for="id_destination" class="form-label">Пункт назначения</label>
                    <select name="id_destination" class="form-control s2">
                        <?foreach($destinations as $key => $value):?>
                            <option value="<?php echo $value['id_destination'] ?>"><?php echo $value['destination'] ?></option>
                        <?endforeach;?>
                    </select>
                </div>

                <div class="col-12 mb-3">
                    <label for="id_movement" class="form-label">Дни движения</label>
                    <select name="id_movement" class="form-control">
                        <?foreach($movements as $key => $value):?>
                            <option value="<?php echo $value['id_movement'] ?>"><?php echo $value['day'] ?></option>
                        <?endforeach;?>
                    </select>
                </div>

                <div class="col-12 mb-3">
                    <label for="travel_time" class="form-label">Время в пути, ч:м</label>
                    <input class="form-control" type="text" name="travel_time" id="travel_time" required>
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
        $("#travel_time").inputmask("99:99",{ "placeholder": "чч-мм" });
    });
</script>