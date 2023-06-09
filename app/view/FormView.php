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
	
	<form action="<?php echo BASEURL.'/formcontroller/'.$data['type'].'/';
				  if ($data['type'] == "update") echo $data['id']; ?>" 
		  method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label>Tên sản phẩm</label>
            <input type="text" class="form-control" name="ten" autocomplete="off" required
				   value="<?php if (isset($data['sp'])) echo $data['sp']['ten']; ?>">
          </div>

          <div class="form-group">
            <label>Danh mục</label>
            <select class="form-control" name="danhmuc">
			<?php 
				$list = $data["danhmuc"];
				if ($list){
					while($row = $list->fetch_assoc()){
			?>
              <option value="<?php echo $row['ma'];?>"
							 <?php if (isset($data['sp']) and $data['sp']['danhmuc'] == $row['ma']) 
								 echo "selected";?>>
				  <?php echo $row['ten'] ?></option>
			<?php
					}
				}
			?>
            </select>
          </div>

          <div class="form-group">
            <label>Ảnh</label>
			<input type="file" class="form-control" name="anh">
          </div>

      </div>
      <div class="modal-footer">
		  <a class="btn btn-secondary" href="<?php echo BASEURL; ?>" class="card-link">Quay lại</a>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
</body>
</html>