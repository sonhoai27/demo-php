<div class="row">
   <div class="col-xs-12">
        <form action="?a=product_c&dir=2" accept-charset="utf-8" method="post">
            <div class="col-xs-12 sh_prd_header_btn_action">
              <div class="sh_title_manager_product">
                  <h3>Chi tiết sản phẩm</h3>
              </div>
              <div class="sh_prd_btn_action">
                  <button type="submit"><p>Cập nhật</p></button>
                  <a href="?a=admin_product"><p>Hủy</p></a>
              </div>
            </div>
        <div class="col-xs-10 sh_content_prd_detail">
                <?php foreach($data as $key => $val){ ?>
                    <input type="text" value="<?php echo $val['id_watch']?>" placeholder="Name" style="display: none" name="id-sp">
                    <label for="">Tên</label>
                    <input type="text" value="<?php echo $val['name_watch']?>" placeholder="Name" name="ten-sp">
                    <label for="">Giá</label>
                    <input type="text" value="<?php echo $val['price_watch']?>" placeholder="Price" name="gia-sp">
                    <label for="">Sale</label>
                    <input type="text" value="<?php echo $val['sale_watch']?>" placeholder="Sale" name="sale-sp">
                    <label for="">Hãng</label>
                    <input type="text" value="<?php echo $val['brand_id']?>" placeholder="Brand" name="hang-sp">
                    <label for="">Màu</label>
                    <input type="text" value="<?php echo $val['color_watch']?>" placeholder="Color" name="mau-sp">
                    <label for="">Giới tính</label>
                    <input type="text" value="<?php echo $val['sex_watch']?>" placeholder="Sex" name="gioi-tinh">
                    <label for="">Kích thước</label>
                    <input type="text" value="<?php echo $val['size_watch']?>" placeholder="Size" name="size-sp">
                    <label for="">Hình ảnh</label>
                    
                    <div class="sh_notify">
                       <p>Lưu ý: update ảnh chỉ hiệu lực khi update từng ảnh.Làm bằng ajax</p>
                    </div>
                    </form>
                    <div class="sh_show_img_detail_prd col-xs-12" style="padding-left: 0px">
                        <img src="<?php echo $val['img_1']?>" class="img img-responsive sh_prd_d1" id="prd_d_img1" />
                        <form id="uploadimage1" method="POST" enctype="multipart/form-data" class="input_file_container" >
                            <input type="file" name="img-sp-1" class="input_file">
                            <input type="text" name="id_prd" class="display_hidden" value="prd <?php echo $val['id_watch']?> 1">
                            <input type="submit" name="update-img" id="prd_id_1" value="Update"></input>
                        </form>
                        <img src="<?php echo $val['img_2']?>" class="img img-responsive sh_prd_d2" />
                        <form id="uploadimage2" method="POST" enctype="multipart/form-data" class="input_file_container" >
                            <input type="file" name="img-sp-1" class="input_file">
                            <input type="text" name="id_prd" class="display_hidden" value="prd <?php echo $val['id_watch']?> 2">
                            <input type="submit" name="update-img" id="prd_id_2" value="Update"></input>
                        </form>
                        <img src="<?php echo $val['img_3']?>" class="img img-responsive sh_prd_d3" />
                        <form id="uploadimage3" method="POST" enctype="multipart/form-data" class="input_file_container" >
                            <input type="file" name="img-sp-1" class="input_file">
                            <input type="text" name="id_prd" class="display_hidden" value="prd <?php echo $val['id_watch']?> 3">
                            <input type="submit" name="update-img" id="prd_id_3" value="Update"></input>
                        </form>
                    </div>
                    <div id="show-res-img"></div>
                <?php } ?>
        </div>
   </div> 
</div>
</div>
</div>
</div>