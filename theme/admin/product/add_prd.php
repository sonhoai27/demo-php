<div class="row">
   <div class="col-xs-12">
        <form action="?a=product_c&dir=1" accept-charset="utf-8" method="post" enctype="multipart/form-data">
            <div class="col-xs-12 sh_prd_header_btn_action">
              <div class="sh_title_manager_product">
                  <h1>Thêm mới</h1>
              </div>
              <div class="sh_prd_btn_action">
                  <button type="submit"><p>Thêm</p></button>
                  <a href="?a=admin_product"><p>Hủy</p></a>
              </div>
            </div>
        <?php
            if(isset($_SESSION["SH_ERROR_ADD_NEW"])){?>
                <div class="col-xs-12" style="margin-top: 25px;">
                    <div class="alert alert-warning">
                        <strong>Warning!</strong> Có lỗi trong quá trình thêm sản phẩm mới như là:
                        <ul type="none">
                            <li>Upload hình.</li>
                            <li>Không điền tên sản phẩm.</li>
                            <li>Không điền giá sản phẩm.</li>
                            <li>...</li>
                        </ul>
                    </div>
                </div>
        <?php } ?>
        <div class="col-xs-8 sh_content_prd_detail">
            <label for="">Tên</label>
            <input type="text" placeholder="Name" name="ten-sp">
            <label for="">Giá</label>
            <input type="text" placeholder="Price" name="gia-sp">
            <label for="">Sale</label>
            <input type="text" placeholder="Sale" name="sale-sp">
            <label for="">Hãng</label>
            <input type="text"  placeholder="Brand" name="hang-sp">
            <label for="">Màu</label>
            <input type="text"  placeholder="Color" name="mau-sp">
            <label for="">Giới tính</label>
            <input type="text" placeholder="Sex" name="gioi-tinh">
            <label for="">Kích thước</label>
            <input type="text" placeholder="Size" name="size-sp">
            <div class="sh_show_img_detail_prd col-xs-12" style="padding-left: 0px">
                <label>Upload ảnh</label>
                <i class="fa fa-plus" aria-hidden="true" id="sh_add_new_btn_upload_img"></i>
                <div class="input_file_container">
                    <input type="file" name="img-sp[]" id="img-sp" class="input_file">
                </div>
            </div>
            </form>
        </div>
   </div> 
</div>
</div>
</div>
</div>
