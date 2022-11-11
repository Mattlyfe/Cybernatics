<link href="../style.css" media="screen" rel="stylesheet" type="text/css"/>
<form action="saveproduct.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Add Product</h4></center>
<hr>
<div id="ac">
<span>Product Code : </span><input type="text" style="width:359px; height:40px;" name="productCode" ><br>
<span>Generic Name : </span><input type="text" style="width:359px; height:40px;" name="genName" Required/><br>
<span>Product Name : </span><textarea style="width:359px; height:40px;" name="productName"> </textarea><br>
<span>Category : </span><select name ="category" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
    <option selected hidden>Choose...</option>
    <option value="3">Condiments</option>
    <option value="4">Cookies and Crackers</option>
    <option value="5">Dairy</option>
    <option  value="6">Fashion</option>
  </select><br>
<span>Selling Price : </span><input type="text" id="txt1" style="width:359px; height:40px;" name="productPrice" onkeyup="sum();" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" Required><br>
<span>Original Price : </span><input type="text" id="txt2" style="width:359px; height:40px;" name="oPrice" onkeyup="sum();" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" Required><br>
<span>Profit : </span><input type="text" id="txt3" style="width:359px; height:40px;" name="profit" readonly><br>

<span>Quantity : </span><input type="number" style="width:359px; height:40px;" min="0" id="txt11" onkeyup="sum();" name="qty" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" Required ><br>
<span></span><input type="hidden" style="width:359px; height:40px;" id="txt22" name="qty_sold" Required ><br>
<div style="text-align: center; margin-top: 10px">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>
