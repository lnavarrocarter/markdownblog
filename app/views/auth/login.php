<section id="services-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="text-center">
                    <a class="navbar-brand" style="display:inline-block; float:none; color:#333377 !important;" href="<?php echo base_url();?>"><?php echo $options->site_name;?></a>
                    <br/>
                    <img src="<?php echo base_url();?>assets/img/logo_top.png" alt="<?php echo $options->site_name;?> - <?php echo $options->site_motto;?>">
                </div>
                <br/>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 style="margin-bottom: 5px" class="text-center">
                    		Iniciar Sesión
                    	</h2>
                    </div>
                    <div class="panel-body">
                        <?php if($this->session->flashdata('error')):?>
					    <div class="alert alert-danger alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>¡Error!</strong> <?php echo $this->session->flashdata('error');?>
						</div>
						<?php endif;?>
						<?php if(!$options->grecaptcha_site && !$options->grecaptcha_secret):?>
					    <div class="alert alert-warning alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>¡Advertencia!</strong> No has configurado el servicio reCaptcha de Google. Tu sitio podría verse expuesto a ataques computacionales de fuerza bruta. Haz click <a href="https://www.google.com/recaptcha/admin" target="_blank">aquí</a> para obtener claves para tu servicio, y luego ingrésalas en Ajustes->Seguridad. 
						</div>
						<?php endif;?>
                        <br/>
                        <form action="<?php echo base_url();?>auth/login_action" method="post">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
                                        <input name="email" class="form-control" type="text" value="<?php echo $this->input->post('email');?>" placeholder="Escribe tu dirección de correo electrónico..." />
                                    </div>
                                    <small class="form-text text-danger"><?php echo form_error('email'); ?></small>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
                                        <input name="passwd" class="form-control" type="password" value="" placeholder="Escribe tu contraseña..." />
                                    </div>
                                    <small class="form-text text-danger"><?php echo form_error('passwd'); ?></small>
                                </div>
                                <div class="text-center">
                                	<?php if($options->grecaptcha_site && $options->grecaptcha_secret):?>
                                    <div class="g-recaptcha" style="margin:0 auto" data-sitekey="<?php echo $options->grecaptcha_site;?>"></div>
                                	<?php endif;?>
                                    <br/>
                                    <br/>
                                    <input type="submit" id="submitBtn" value="Iniciar Sesion" class="btn btn-success">
                                    <br/>
                                    <br/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
