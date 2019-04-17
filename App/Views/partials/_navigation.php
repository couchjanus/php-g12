<header>
    <nav class="navbar">
        <input type="checkbox" id="menu-trigger">
        <label class="label" for="menu-trigger">
            <i class="fas fa-align-justify"></i>
        </label>
        <span class="cart" id="cart-toggle"><i class="fas fa-cart-plus"></i></span>
        <ul class="nav-menu">
            <li class="nav-item"><a href="#">Home</a></li>
            <li class="nav-item"><a href="#">About</a></li>
            <li class="nav-item"><a href="#">Blog</a></li>
            <li class="nav-item"><a href="#">Contact</a></li>
            
            <?php if (Helper::isGuest()) :?>
                <li class="nav-item"><a href="/auth" id="auth"><i class="fa fa-user"></i>&nbsp;Sign In/Up</a></li>
            <?php else :?>    
                <li class="nav-item"><a href="/logout" id="logout"><i class="fa fa-user"></i>&nbsp;Sign Out</a></li>
            <?php endif;?>
        </ul>
    </nav>

</header>