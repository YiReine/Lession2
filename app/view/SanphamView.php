<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<div class="search-area">
		<form action="<?php echo BASEURL; ?>/sanphamcontroller/search" method="post">                    
		 <input type = "text" name = "search" placeholder = "Nhập từ khóa cần tìm" value =
		 "<?php if(isset($_POST["search"])) { echo $_POST["search"]; } ?>" >
		 <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
		 </form>

	</div>
	
	<a class="btn btn-primary btn-sm" href="<?php echo BASEURL; ?>/formcontroller/create">
			  Tạo mới </a>
	<table id="example1" class="table table-bordered table-striped">
		<thead>
			<tr id="tbheader">
				<th><input type="checkbox" id="check-all-gd"></th>
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
				<td><input type="checkbox" class="cbsp" value="<?php echo $row['ma'] ?>"></td>

				<td><?php echo $row['ma'] ?></td>
				<td><?php echo $row['ten'] ?></td>
				<td><?php echo $this->getDmByID($row['danhmuc']) ?></td>
				<td><img style="width: 50px" alt="<?php echo $row['ten'] ?>"
						 src="<?php echo BASEURL; ?>/public/img/<?php echo $row['anh'] ?>"></td>

				<td class="text-center">
				<a class="btn btn-primary btn-sm" href="<?php echo BASEURL; ?>/formcontroller/show/
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
	<?php 
	for($page = 1; $page<= $data['nop']; $page++) {
		echo '<a href = "'.BASEURL.'?page=' . $page . '">' . $page . '</a>';

	}

	?>
</body>
</html>