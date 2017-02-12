<section id="settings-sec" class="padding-60">
    <div class="container">
        <?php if($this->session->flashdata('success')):?>
        <div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>¡Éxito!</strong>
            <?php echo $this->session->flashdata('success');?>
        </div>
        <?php endif;?>
        <form action="<?php echo base_url();?>admin/save_settings" method="post">
            <!-- INICIO: Tabs de Ajustes -->
            <div class="col-md-4">
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a data-toggle="pill" href="#general">Ajustes Generales</a></li>
                    <li><a data-toggle="pill" href="#sections">Ajustes de Secciones</a></li>
                    <li><a data-toggle="pill" href="#social">Links Sociales</a></li>
                    <li><a data-toggle="pill" href="#others">Otros Ajustes</a></li>
                </ul>
                <br/>
                <input type="submit" id="submitBtn" class="btn btn-success" value="Guardar Ajustes">
            </div>
            <!-- FIN: Tabs de Ajustes -->
            <div class="col-md-8">
                <div class="tab-content">
                    <!-- INICIO: Ajustes Generales -->
                    <div class="tab-pane fade in active" id="general">
                        <h1>Ajustes Generales <small>Configuraciones básicas y mínimas para hacer el sitio lucir mejor.</small></h1>
                        <hr>
                        <h3>Ajustes de Sitio</h3>
                        <!-- NOMBRE DEL SITIO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><strong>Nombre del Sitio: </strong></span>
                                <input name="site_name" class="form-control" type="text" value="<?php echo $options->site_name;?>" placeholder="Escribe el nombre de tu sitio..." />
                            </div>
                            <small class="form-text text-muted">El nombre de tu sitio aparecerá en el título del navegador y en el navbar. ¡No lo hagas muy largo!</small>
                        </div>
                        <!-- LEMA DEL SITIO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><strong>Lema del Sitio: </strong></span>
                                <input name="site_motto" class="form-control" type="text" value="<?php echo $options->site_motto;?>" placeholder="Escribe el lema de tu sitio..." />
                            </div>
                            <small class="form-text text-muted">El lema de tu sitio aparecerá en el título del navegador en la primera vista, y quizás en otros lugares. ¡Asegúrate de que sea pegasoso!</small>
                        </div>
                        <!-- URL DEL SITIO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><strong>Url del Sitio: </strong></span>
                                <input disabled name="site_url" class="form-control" type="text" value="<?php echo $options->site_url;?>" placeholder="Escribe la url de tu sitio..." />
                            </div>
                            <small class="form-text text-muted">Si cambias este ajuste tu sitio podría dejar de funcionar. Por ello, hemos desactivado esta función por seguridad. Si quieres cambiarla, pincha este <a href="<?php echo base_url();?>home/siteurl_change">link</a> y mandaremos un correo al SuperAdministrador con instrucciones para proceder.</small>
                        </div>
                        <hr>
                        <h3>Ajustes del Footer</h3>
                        <!-- TITULO DESCRIPCIÓN FOOTER -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><strong>Título Descripción: </strong></span>
                                <input name="footer_description_title" class="form-control" type="text" value="<?php echo $options->footer_description_title;?>" placeholder="Escribe el título de la descripción del footer..." />
                            </div>
                            <small class="form-text text-muted">Este título aparecerá en el footer de la página, al lado izquierdo. Puede ser un "Sobre Ti".</small>
                        </div>
                        <!-- DESCRIPCIÓN FOOTER -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><strong>Descripción: </strong></span>
                                <textarea name="footer_description_content" rows="5" class="form-control" type="text" placeholder="Escribe el texto para la descripción del footer..."><?php echo $options->footer_description_content;?></textarea>
                            </div>
                            <small class="form-text text-muted">Puedes escribir unas cuantas líneas sobre ti, tu proyecto o la razón de tu página web. Puedes utilizar etiquetas HTML.</small>
                        </div>
                        <!-- TEXTO COPYRIGHT -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><strong>Copyright: </strong></span>
                                <input name="footer_copy_text" class="form-control" type="text" value="<?php echo $options->footer_copy_text;?>" placeholder="Escribe el texto de copyright del footer..." />
                            </div>
                            <small class="form-text text-muted">Espanta a los que quieran robar tus derechos de autor con un buen texto de copyright al final de tu página. ¡Asegúrate que incluya tu nombre o el de tu empresa!</small>
                        </div>
                        <!-- NUM ULTIMAS ENTRADAS FOOTER -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><strong>N° de Últimas Entradas: </strong></span>
                                <input name="posts_show_footer" class="form-control" type="number" value="<?php echo $options->posts_show_footer;?>" />
                            </div>
                            <small class="form-text text-muted">Selecciona cuántas "Últimas Entradas" quieres mostrar en el footer de tu página web.</small>
                        </div>
                    </div>
                    <!-- FIN: Ajustes Generales -->
                    <!-- INICIO: Ajustes de Secciones -->
                    <div class="tab-pane fade" id="sections">
                        <h1>Ajustes de Secciones <small>Configura las diferentes secciones disponibles.</small></h1>
                    </div>
                    <!-- FIN: Ajustes de Secciones -->
                    <!-- INICIO: Links Sociales -->
                    <div class="tab-pane fade" id="social">
                        <h1>Links Sociales <small>Configura tus enlaces a las redes sociales.</small></h1>
                    </div>
                    <!-- FIN: Links Sociales -->
                    <!-- INICIO: Otros Ajustes -->
                    <div class="tab-pane fade" id="others">
                        <h1>Otros Ajustes <small>Otros ajustes de menor importancia.</small></h1>
                    </div>
                    <!-- FIN: Otros Ajustes -->
                </div>
            </div>
        </form>
</section>
