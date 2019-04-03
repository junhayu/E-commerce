 <div class="header">

        <div class="container">

            <div class="row">

                <div class="col-md-3 col-sm-4">

                    <div class="logo">

                        <a href="./index.php">

                            <img src="img/logo.png" alt="Orani E-shop">

                        </a>

                    </div>

                </div>

                <div class="col-md-7 col-sm-5">

                    <div class="search-form">

                        <form class="navbar-form" onsubmit="alert('Under Development'); return false;"role="search">

                            <div class="form-group">

                              <input type="text" class="form-control" placeholder="What do you need...">

                            </div>

                            <button type="submit" class="btn"><i class="fa fa-search"></i></button>

                        </form>

                    </div>

                </div>

                <div class="col-md-2 col-sm-3">

                    <div class="cart">

                        <div class="cart-icon showCart" data-toggle="modal" data-target="#exampleModalCenter">

                            <a href="#" ><i class="fa fa-shopping-cart"></i></a>

                        </div>

                        <div id="cart-text" class="cart-text">

                            SHOPPING CART

                            <br>

                            {{numOfProducts}} items - ${{totalPrice}}

                        </div>

                    </div>
					

                </div>

            </div>

        </div>

    </div>