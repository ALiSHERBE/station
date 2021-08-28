<div class="row">
	<div class="col-md-12">
		<div class="py-4 text-center">
			<h2>Редактирование</h2>
		</div>

		<form method="POST" action="/admin/update.php">
			<input type="hidden" value="stops" name="table">
			<input type="hidden" value="<?php echo $stop['id_stop'] ?>" name="id_item">
			<input type="hidden" value="id_stop" name="id_table">

			<div class="row">
                <div class="col-12 mb-3">
                    <label for="stop" class="form-label">Остановка</label>
                    <input class="form-control" type="text" name="stop" id="stop" required value="<?php echo $stop['stop'] ?>">
                </div>

                <div class="col-12 mb-3">
                    <label for="id_route" class="form-label">Маршрут</label>
                    <select name="id_route" class="form-control s2">
						<?foreach($routes as $key => $value):?>
                            <option value="<?php echo $value['id_route'] ?>"
                            <?php if ($stop['id_route'] == $value['id_route']):?>
                                selected
                            <?php endif?>
                            ><?php echo $value['departure'] ?> - <?php echo $value['destination'] ?></option>
						<?endforeach;?>
                    </select>
                </div>

				<div class="col-12">
					<input class="w-100 btn btn-primary btn-lg" name="submit" type="submit" value="Обновить">
				</div>
			</div>
		</form>
	</div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function(){
        $('.s2').select2();
    });
</script>