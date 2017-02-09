<section id="sliders-sec" class="padding-60">
    <div class="container">
    <?php if($this->session->flashdata('success')):?>
    <div class="alert alert-success alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>¡Éxito!</strong> <?php echo $this->session->flashdata('success');?>
	</div>
	<?php endif;?>
        <div class="text-center">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newSlider">
                Nuevo Slider
            </button>
            <hr>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th> # </th>
                    <th> Título </th>
                    <th> Bajada </th>
                    <th> Botón </th>
                    <th> Acción </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sliderdata as $slider):?>
                <tr>
                    <td>
                        <?php echo $slider->order;?>
                    </td>
                    <td>
                        <?php echo $slider->title;?>
                    </td>
                    <td>
                        <?php echo $slider->lead;?>
                    </td>
                    <td>
                        <a href="<?php echo $slider->btn_link;?>" target="_blank"><?php echo $slider->btn_text;?></a>
                    </td>
                    <td><a href="<?php echo base_url();?>admin/delete_slider/<?php echo $slider->id;?>" class="btn btn-danger btn-xs"> Eliminar</a> <a href="<?php echo base_url();?>admin/edit_slider/<?php echo $slider->id;?>" class="btn btn-default btn-xs"> Editar</a></td>
					</tr>
				<?php endforeach;?>
			</tbody>
        </table>        
    </div>
</section>
<!-- INICIO: New Slider Modal -->
<div class="modal fade" id="newSlider" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nuevo Slider</h4>
            </div>
            <form action="<?php echo base_url();?>admin/create_slider" method="post">
	            <div class="modal-body">
	                <div class="form-group">
					    <label for="title">Título: </label>
					    <input type="text" class="form-control" name="title" aria-describedby="emailHelp" placeholder="Escribe el título del slider...">
				  	</div>
				  	<div class="form-group">
					    <label for="lead">Example textarea</label>
					    <textarea class="form-control" name="lead" rows="3" placeholder="Escribe un texto como bajada del slider..."></textarea>
					</div>
				  	<div class="form-group">
					    <label for="text">Texto del Botón: </label>
					    <input type="text" class="form-control" name="text" aria-describedby="emailHelp" placeholder="Escribe el texto del botón del slider...">
				  	</div>
				  	<div class="form-group">
					    <label for="url">Url del Botón: </label>
					    <input type="text" class="form-control" name="url" aria-describedby="emailHelp" placeholder="Escribe la dirección del enlace del botón del slider...">
				  	</div>
				  	<div class="form-group">
					    <label for="order">Orden: </label>
					    <input type="number" class="form-control" name="order" aria-describedby="emailHelp" placeholder="Escribe el orden de prioridad del slider...">
				  	</div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	                <input type="submit" class="btn btn-primary" value="Crear">            
	          	</div>
        	</form>
        </div>
    </div>
</div>
<!-- FIN: New Slider Modal -->
