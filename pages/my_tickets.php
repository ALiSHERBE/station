<div class="row">
	<div class="col-md-12">
		<div class="py-4 text-center">
			<h2>Мои билеты</h2>
		</div>
		<div>
			<?php if (empty($flights)):?>
				<p>Пока вы не приобретали билеты</p>
			<?php else:?>
				<ul class="list-group mb-5">
					<? foreach ($tickets as $key => $value): ?>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							<?php echo $value['departure'] ?> - <?php echo $value['destination'] ?>
							<span class="badge bg-primary rounded-pill"><?php echo $value['created_at'] ?></span>
						</li>
					<? endforeach; ?>

				</ul>
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
							<td><a href="/buy.php?f=<?php echo $value['id_flight'] ?>" class="btn btn-outline-primary">купить еще раз</a></td>
						</tr>
					<? endforeach; ?>
					</tbody>
				</table>
			<?php endif?>
		</div>
	</div>
</div>