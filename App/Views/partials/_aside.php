<!-- Aside Area Start -->
<aside class="aside">
        <!-- Aside Area Start -->
        <header><a href="#0" class="toggle-sidebar">close</a></header>
        <div id="cart-sidebar" class="cart--sidebar">
            <h2>Cart</h2>
            <!-- cart-items start-->
            <ul class="cart-items">


            </ul>
            <!-- cart-items end -->

            <div class="cart-total">
                <p>Total <span>$00.00</span></p>
            </div> <!-- cart-total -->

            <a href="#" class="checkout-button">Checkout</a>
            <a href="#" class="clear-cart">Clear Cart</a>
        </div> <!-- cart end -->
        <!-- Aside Area end -->
</aside>
<!-- Aside Area end -->

    <template id="productItem">
        <article class="grid-item">
            <div class="product-wrapper">
                <div class="product" id="productId">
                    <p class="product-name"></p>
                    <div class="icon">
                        <div class="icon-background"></div>
                        <span class="shopping-cart">
                            <i class="fas fa-cart-plus"></i>
                        </span>
                    </div>
                    <div class="product-picture">
                        <img src="" alt="">
                    </div>
                    <div class="product-menu">
                        <div class="product-price">

                        </div>
                        <div class="buy-now">
                            Buy now!
                        </div>
                        <div class="product-detail">
                            <a>Detail</a>
                        </div>

                        <div class="how-many">
                            <div class="quantity-input">
                                <input class="minus btn" type="button" value="-">
                                <input class="input-text quantity text" value="3" size="4">
                                <input class="plus btn" type="button" value="+">
                            </div>
                        </div>
                        <div class="cancel">
                            Cancel
                        </div>
                        <div class="add-to-cart">
                            Add to Cart!
                        </div>
                    </div>
                </div>
                <div class="product-back">
                    <span class="check">
                        <i class="fa fa-check fa-4x"></i>
                        <p>Success!</p>
                    </span>
                </div>
            </div>
        </article>
    </template>

    <template id="cartItem">
        <li class="cart-item">
            <span class="productInCart" id=""></span>
            <div class="item-img">
                <img src="/cat3.06d0e916.jpg" alt="">
            </div>
            <span class="item-name"></span>
            <span class="item-quantity"></span>
            <strong class="item-price"></strong>
            <strong class="item-prices"></strong>
            <div class="remove-item"></div>
            <div class="cart-item-border"></div>

        </li>
    </template>

    <template id="productDetail">
        <div class="carousel-wrapper">
            <div class="carousel">
                <div class="carousel__nav">
                    <span id="moveLeft" class="carousel__arrow">
                        <svg class="carousel__icon" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path>
                        </svg>
                    </span>
                    <span id="moveRight" class="carousel__arrow">
                        <svg class="carousel__icon" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
                        </svg>
                    </span>
                </div>
                <div class="carousel-item carousel-item--1">
                    <div class="carousel-item__image"></div>
                    <div class="carousel-item__info">
                        <div class="carousel-item__container">
                            <h2 class="carousel-item__subtitle">The grand mom </h2>
                            <h1 class="carousel-item__title">Je t'adore</h1>
                            <p class="carousel-item__description">Sed ut perspiciatis unde omnis iste natus error sit
                                voluptatem
                                accusantium doloremque laudantium, totam rem aperiam.</p>
                            <a href="#" class="carousel-item__btn">Explore now</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item carousel-item--2">
                    <div class="carousel-item__image"></div>
                    <div class="carousel-item__info">
                        <div class="carousel-item__container">
                            <h2 class="carousel-item__subtitle">The big cat </h2>
                            <h1 class="carousel-item__title">Mama mia!</h1>
                            <p class="carousel-item__description">Clear Glass Window With Brown and White Wooden Frame
                                iste
                                natus error
                                sit voluptatem accusantium doloremque laudantium.</p>
                            <a href="#" class="carousel-item__btn">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item carousel-item--3">
                    <div class="carousel-item__image"></div>
                    <div class="carousel-item__info">
                        <div class="carousel-item__container">
                            <h2 class="carousel-item__subtitle">Tropical cat </h2>
                            <h1 class="carousel-item__title">Palmovil</h1>
                            <p class="carousel-item__description">Sed ut perspiciatis unde omnis iste natus error sit
                                voluptatem
                                accusantium doloremque laudantium, totam rem aperiam.</p>
                            <a href="#" class="carousel-item__btn">Explore this</a>
                        </div>
                    </div>
                </div>

                <div class="carousel-item carousel-item--4">
                    <div class="carousel-item__image"></div>
                    <div class="carousel-item__info">
                        <div class="carousel-item__container">
                            <h2 class="carousel-item__subtitle">Beach cat</h2>
                            <h1 class="carousel-item__title">The beach </h1>
                            <p class="carousel-item__description">Sed ut perspiciatis unde omnis iste natus error sit
                                voluptatem
                                accusantium doloremque laudantium, totam rem aperiam.</p>
                            <a href="#" class="carousel-item__btn">Explore the beach</a>
                        </div>
                    </div>
                </div>

                <div class="carousel-item carousel-item--5">
                    <div class="carousel-item__image"></div>
                    <div class="carousel-item__info">
                        <div class="carousel-item__container">
                            <h2 class="carousel-item__subtitle">The white cat </h2>
                            <h1 class="carousel-item__title">White building cat</h1>
                            <p class="carousel-item__description">Sed ut perspiciatis unde omnis iste natus error sit
                                voluptatem
                                accusantium doloremque laudantium, totam rem aperiam.</p>
                            <a href="#" class="carousel-item__btn">Read more</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </template>

    