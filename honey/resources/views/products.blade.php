<x-app-layout>
    
            <div class = "products">
                <div class = "container">
                    <h1 class = "head-title">Featured Products</h1>
                    <p class = "text-light">We offer highly products that are specially crafted to nourish and moisturize your skin.</p>
    
                    <div class = "product-items">
                        <!-- single product1 -->
                        <div class = "product">
                            <div class = "product-content">
                                <div class = "product-img">
                                    <img src = "/storage/keyring.jpg" alt = "product image">
                                </div>
                                <div class = "product-btns">
                                   <a href="{{ route('keyring-details', $id) }}"><button type = "button" class = "btn-details"> view details 
                                        <span><i class = "fas fa-plus"></i></span>
                                    </button></a>
                                </div>
                            </div>
                            
    
                            <div class = "product-info">
                                <div class = "product-info-top">
                                    <h2 class = "prod-title">Beauty</h2>

                                    
                                </div>
                                <a href = "#" class = "product-name">Glossy Balm (Keyring Collection)</a>
                                <p class = "product-price">₱ 149.00</p>
                            </div>  
                        </div>
                        <!-- end of single product1 -->
    
                        <!-- single product2 -->
                        <div class = "product">
                            <div class = "product-content">
                                <div class = "product-img">
                                    <img src = "/storage/highshine1.jpg" alt = "product image">
                                </div>
                                <div class = "product-btns">
                                    <a href="{{ route('highshine-details', $id) }}"><button type = "button" class = "btn-details"> view details 
                                         <span><i class = "fas fa-plus"></i></span>
                                     </button></a>
                                 </div>
                            </div>
    
                            <div class = "product-info">
                                <div class = "product-info-top">
                                    <h2 class = "prod-title">Beauty</h2>

                                    
                                </div>
                                <a href = "#" class = "product-name">Glossy Balm (High Shine Colour Lip Gloss)</a>
                                <p class = "product-price">₱ 249.00</p>
                            </div>
                        </div>
                        <!-- end of single product2 -->
                    </div>
                </div>
            </div> 
            
    </body>
    </html>
</x-app-layout>