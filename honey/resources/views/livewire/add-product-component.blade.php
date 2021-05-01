<div class="main">
    <div class="AP">
        <div class="main-content">
            <div class="container" >
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="AP-panel">
                                <div class="row">
                                    <div class="AP-h2" style="color: #ff9800;">
                                        <h2>ADD NEW PRODUCT</h2>
                                    </div>
    
                                </div>
                            </div>
                            <div class="container">
                                <div class="APform">
                                    <?php $new_product_brand = ''; $new_product_price = ''; $new_product_description = ''; $new_product_image = ''; $prod_id = 0;?>
                                    <form action="{{ route('saveNewProduct') }}">

                                        <div class="AP-form-steps">
                                        <h4>Product Brand <i class = "fas fa-check-square"></i></li></h4>
                                        <input type="text" class="textfield" placeholder="Product Brand" required="" value="{{ $new_product_brand }}" id="new_product_brand" name="new_product_brand">
    
                                        </div>
                                        
                                        <div class="AP-form-steps">
                                        <h4>Product Description <i class = "far fa-comment-alt"></i></li></h4>
                                        <input  type="text" class="textfield" placeholder="Product Description" style="height:100px" value ="{{ $new_product_description }}" required="" id="new_product_description" name="new_product_description">
    
                                        </div>
    
                                        <div class="AP-form-steps">
                                        <h4>Product Price <i class = "fas fa-money-bill"></i></li></h4>
                                        <input type="text" class="textfield" placeholder="Product Price" value ="{{ $new_product_price }}" id="new_product_price" name="new_product_price"required="">
    
                                        </div>
    
                                        <div class="AP-form-steps">
                                            <h4>Product Image <i class = "fas fa-image"></i></li></h4>
                                            <img src="" style="height: 200px"><br>
                                            <input type="file" class="input-file" value ="{{ $new_product_image }}" id="new_product_image" name="new_product_image"required="">
        
                                        </div>

                                        <a href=""><button type="submit" class="AP-button">ADD PRODUCT</button></a>
                        
                                </form>

                                

           
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

     