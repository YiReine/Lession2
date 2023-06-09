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
	<div >
		<form class="input-group" action="<?php echo BASEURL; ?>/sanphamcontroller/search" method="post">                    
		 <input type = "text" class="form-control rounded" name = "search" 
				placeholder = "Nhập từ khóa cần tìm" value =
		 "<?php if(isset($_POST["search"])) { echo $_POST["search"]; } ?>" >
		 <button type="submit" class="btn btn-outline-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
		</form>

	</div>
	
	<a class="btn btn-primary btn-sm" href="<?php echo BASEURL; ?>/formcontroller/create">
			  Tạo mới </a>
	<table id="example1" class="table table-bordered table-striped">
		<thead>
			<tr id="tbheader">
				
				<th>Mã sản phẩm</th>
				<th>Tên sản phẩm</th>
				<th>Danh mục</th>
				<th>Ảnh</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			$list = $data["sp"];
			if ($list){
				while($row = $list->fetch_assoc()){
		?>
			<tr>

				<td><?php echo $row['ma'] ?></td>
				<td><?php echo $row['ten'] ?></td>
				<td><?php echo $this->getDmByID($row['danhmuc']) ?></td>
				<td><img style="width: 50px" alt="<?php echo $row['ten'] ?>"
						 src="<?php echo BASEURL; ?>/public/img/<?php echo $row['anh'] ?>"></td>

				<td class="text-center">
				<a class="btn btn-success btn-sm" href="<?php echo BASEURL; ?>/formcontroller/show/
														<?php echo $row['ma'] ?>">
				  Xem </a>
				  <a class="btn btn-primary btn-sm" href="<?php echo BASEURL; ?>/formcontroller/edit/
														<?php echo $row['ma'] ?>">
				  Chỉnh sửa </a>

				  <a class="btn btn-primary btn-sm" href="<?php echo BASEURL; ?>/formcontroller/duplicate/
														<?php echo $row['ma'] ?>">
				  Copy </a>
				<a class="btn btn-danger btn-sm" href="<?php echo BASEURL; ?>/formcontroller/delete/
														<?php echo $row['ma'] ?>">
				  Xóa </a>

				</td>
			</tr>
		<?php } 
			}
		?>
		</tbody>
	</table>
	<nav aria-label="...">
	  <ul class="pagination">
		<li class="page-item <?php if($data['page']==1) echo 'disabled'?>">
		  <a class="page-link" href="<?php echo BASEURL.'?page=' . ($data['page']-1) ?>" >Previous</a>
		</li>
		<?php 
			for($page = 1; $page<= $data['nop']; $page++) {
				echo '<li class="page-item';
				
				if ($page == $data['page']) echo ' active';
				echo '"> <a class="page-link" href = "'.BASEURL.'?page=' . $page . '">' . $page . '</a></li>';
			}

		?>
		
		<li class="page-item <?php if($data['page']==$data['nop']) echo 'disabled'?>">
		  <a class="page-link" href="<?php echo BASEURL.'?page=' . ($data['page']+1) ?>">Next</a>
		</li>
	  </ul>
	</nav>
	
</body>
</html>