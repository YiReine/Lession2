<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $data['title'] ?></title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js" integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<!-- Font Awesome -->
	<link
	  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
	  rel="stylesheet"
	/>
	<!-- Google Fonts -->
	<link
	  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
	  rel="stylesheet"
	/>
	<!-- MDB -->
	<link
	  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.css"
	  rel="stylesheet"
	/>
</head>

<body>
	<img style="width: 100px" alt="logo"
						 src="<?php echo BASEURL; ?>/public/img/logo.png ?>">
	<div class="container mt-5">
    
		<div class="card" style="width: 18rem;">
		  <div class="card-body">
			<h5 class="card-title">Tên sản phẩm</h5>
			<h6 class="card-subtitle mb-2 text-muted"><?php echo $data['sp']['ten']; ?></h6>
			<h5 class="card-title">Danh mục</h5>
			<p class="card-text"><?php echo $this->getDmByID($data['sp']['danhmuc']) ?></p>
			<h5 class="card-title">Ảnh</h5>
			<img style="width: 50px" alt="<?php echo $data['sp']['ten']; ?>"
				 src="<?php echo BASEURL; ?>/public/img/<?php echo $data['sp']['anh'] ?>">
			  <br>
			<a href="<?php echo BASEURL; ?>" class="btn btn-secondary">Quay lại</a>
		  </div>
		</div>

	</div>
</body>
</html>