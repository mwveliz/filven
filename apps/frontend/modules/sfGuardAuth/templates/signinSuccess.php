
<?//php decorate_with(false) ?>
  

<div id="formContainer">
<form id="login" action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
		<a href="#" id="flipToRecover" class="flipLink">Olvido Contraseña?</a>
		<!--input type="text" name="loginEmail" id="loginEmail" placeholder="Email" /-->
		<!--input type="password" name="loginPass" id="loginPass" placeholder="Password" /-->
		

                <?php echo $form['username']->render(array('id'=>"loginEmail","placeholder"=>"Usuario")) ?>
               <?php echo $form['password']->render(array('id'=>"loginPass", "placeholder"=>"Contraseña")) ?>
                <?php echo $form['_csrf_token']->render() ?>
                
                   <input type="submit" name="submit" value="Ingresar" />
	</form>
    
    
    
	
</div>