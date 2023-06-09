<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<div class="container mt-5">
    
		<div class="card" style="width: 18rem;">
		  <div class="card-body">
			<h5 class="card-title">Tên sản phẩm</h5>
			<h6 class="card-subtitle mb-2 text-muted"><?php echo $data['sp']['ten']; ?></h6>
			<span class="card-text">Danh mục</span>
			<p class="card-text"><?php echo $this->getDmByID($data['sp']['danhmuc']) ?></p>
			<span class="card-text">Ảnh</span>
			<img style="width: 50px" alt="<?php echo $data['sp']['ten']; ?>"
				 src="<?php echo BASEURL; ?>/public/img/<?php echo $data['sp']['anh'] ?>">
			<a href="<?php echo BASEURL; ?>" class="card-link">Quay lại</a>
		  </div>
		</div>

	</div>
</body>
</html>