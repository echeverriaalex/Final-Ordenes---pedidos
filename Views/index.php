<main class="d-flex align-items-center justify-content-center height-100" >
     <div class="content">
          <header class="text-center">
               <h2>Final</h2>
          </header>

          <?php 
               echo "<br>Estos son los usuarios registrados con sus contraseñas:";
               echo "<br>user@myapp.com 123456";
               echo "<br>final@myapp.com 123456";
          ?>

          <form action="<?php echo FRONT_ROOT?>/User/Login" method="" class="login-form bg-dark-alpha p-5 bg-light">
               <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control form-control-lg" placeholder="Ingresar usuario" required>
               </div>
               <div class="form-group">
                    <label for="">Contraseña</label>
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Ingresar constraseña" required>
               </div>
               <button class="btn btn-primary btn-block btn-lg" type="submit">Iniciar Sesión</button>
          </form>
     </div>
</main>