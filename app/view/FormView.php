<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
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