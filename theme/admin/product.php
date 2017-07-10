<div class="row">
      <div class="col-xs-12 sh_prd_header_btn_action">
          <div class="sh_title_manager_product">
              <h3>Quản lý sản phẩm</h3>
          </div>
          <div class="sh_prd_btn_action">
              <a href="?a=product_c"><p>Thêm mới</p></a>
              <form action="?a=product_c&dir=3" accept-charset="utf-8" method="post">
                  <input type="text" id="get_id_prd" name="delete_id_watch" style="display: none">
                  <button type="submit"><p>Xóa</p></button>
              </form>
          </div>
      </div>
      <div class="col-xs-12 sh_prd_option_search">
          <div class="sh_prd_option_category">
                <select>
                  <option value="volvo">Choose Brand</option>
                  <option value="saab">Saab</option>
                  <option value="opel">Opel</option>
                  <option value="audi">Audi</option>
                </select>
          </div>
          <div class="sh_prd_search">
              <input type="text" placeholder="What are you looking for?"/>
          </div>
      </div>     
      <div class="col-xs-12">
          <div class="sh_prd_table_manager">
              <table class="sh_table_list_order">
                <tr class="sh_border_table">
                    <td width="5%"></td>
                    <td width="15%">Loại</td>
                    <td width="40%">Tên</td>
                    <td width="25%">Giá</td>
                    <td width="15%">Hình</td>
                </tr>
                <?php foreach($resultPrd as $kq => $value_kq){ ?>
                    <tr>
                        <td>
                            <input
                                id="prd_<?php echo $value_kq['id_watch']?>"
                                name ="prd_item_<?php echo $value_kq['id_watch']?>"
                                type="checkbox" class="sh_btn_checkbox" 
                                value="<?php echo $value_kq['id_watch']?>"
                                onclick = "DeleteProductId(<?php echo $value_kq['id_watch']?>)">
                            <label for="prd_<?php echo $value_kq['id_watch']?>"  class="sh_checkbox_label"></label>
                        </td>
                        <td><?php echo $value_kq['sex_watch']?></td>
                        <td><a href="admin?a=prd_detail&id=<?php echo $value_kq['id_watch']?>"><?php echo $value_kq['name_watch']?></a></td>
                        <td><?php echo number_format($value_kq['price_watch']).' VND'?></td>
                        <td><img src="<?php echo $value_kq['img_1']?>" alt="" class="img img-responsive" width="50%"></td>
                    </tr>    
                <?php } ?>
            </table>
          </div>
          <div class="sh_pagination p12">
            <ul>
                <a href="#"><li>Previous</li></a>
                <a href="#"><li>Next</li></a>
            </ul>
          </div>
      </div>    
</div>
</div>
</div>
<script>
    var check_btn_delete = false;
    var array_id = []
    function DeleteProductId(id){
        var text_id = "";
        if(document.getElementById('prd_' + id).checked == true){
            array_id.push(id)
            for(var i = 0; i < array_id.length; i++){
                text_id = text_id + array_id[i] + ","
            }
        }else{
             if(document.getElementById('prd_' + id).checked == false){ 
                for(var i = 0; i < array_id.length; i++){
                    if(array_id[i] == id){
                        for(var j = i; j < array_id.length; j++){
                            array_id[j] =array_id[j + 1]
                        }
                    }
                }
                text_id = "";
                array_id.length--;
                for(var i = 0; i < array_id.length; i++){
                    text_id = text_id + array_id[i] + ","
                }
            }
        }
        document.getElementById('get_id_prd').value = text_id.substr(0, (text_id.length - 1))
    }
</script>
</div>