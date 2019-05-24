<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<title>Files</title>
	</head>
	<body>
		
		<div class="container">
			<h1>Hello, world!</h1>
			<div class="row">
				<form enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="POST">
					<div class="form-group">
						<label for="file">Выбирете файл</label>
						<input type="file" class="form-control-file" id="file" name="fileName">
						<button type="submit" class="btn btn-primary">Upload</button>
					</div>
				</form>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">File name</th>
						<th scope="col">Size of file</th>
						<th scope="col">Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($files)):?>
						<?php foreach($files as $key => $file):?>
							<tr>
								<td><?=($key+1)?></td>
								<td><?=$file['name']?></td>
								<td><?=$file['size']?></td>
								<td><a href="<?=$_SERVER['PHP_SELF']?>?del=<?=$file['name']?>" class="btn btn-primary">Delete</a></td>
							</tr>
						<?php endforeach?>
					<?php else:?>
						<tr>
							<td colspan="4" style="text-align: center;">Папка пуста</td>
						</tr>
					<?php endif?>
				</tbody>
			</table>
            <?php if(isset($_SESSION['message'])):?>
            <div>
                <?=$_SESSION['message']?>
            </div>
            <?php endif?>
		</div>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		</body>
</html>