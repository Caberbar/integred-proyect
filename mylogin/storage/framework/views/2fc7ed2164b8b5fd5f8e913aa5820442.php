<div class="hero">
    <nav> <!-- MENU DE NAVEGACION -->
        <div class="logo">
            <img src="assets/image/logo-cosmos.svg" alt="">
        </div>
        <div class="menu">
            <div class="colapsado esconder" id="menu-colapsado">
                <span class="linea"></span>
                <span class="linea"></span>
                <span class="linea"></span>
            </div>
            <ul class="lista-menu" id="menu-lista">
                <li class="item-menu"><a href="">Home</a></li>
                <li class="item-menu"><a href="<?php echo e(route('register')); ?>">Register</a></li>
                <li class="item-menu"><a href="<?php echo e(route('login')); ?>">Login</a></li>
                <li class="item-menu"><a href="<?php echo e(route('logout')); ?>">Logout</a></li>
            </ul>
        </div>

    </nav>
</div><?php /**PATH C:\xampp\htdocs\integred-proyect\mylogin\resources\views/layout/partials/navigation.blade.php ENDPATH**/ ?>