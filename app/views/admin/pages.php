<section id="pages-sec" class="padding-60">
    <div class="container">
    <?php if($this->session->flashdata('success')):?>
    <div class="alert alert-success alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>¡Éxito!</strong> <?php echo $this->session->flashdata('success');?>
	</div>
	<?php endif;?>
        <div class="text-center">
            <a class="btn btn-primary" href="<?php echo base_url();?>admin/create_page"> Nueva Página </a>
            <hr>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th> # </th>
                    <th> Título </th>
                    <th> Publicada </th>
                    <th> Acción </th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;?>
                <?php foreach ($pagedata as $page):?>
                <tr>
                    <td>
                        <?php echo $i;?>
                    </td>
                    <td>
                        <?php if ($page['is_published'] == "on"):?>
                         <span class="label label-success"><i data-toggle="tooltip" data-placement="top" data-original-title="Publicada" class="fa fa-check fa-fw"></i></span> <a href="<?php echo base_url();?>home/page/<?php echo $page['slug'];?>"> <?php echo $page['title'];?></a>
                        <?php else:?>
                        <span class="label label-danger"><i data-toggle="tooltip" data-placement="top" data-original-title="No Publicada" class="fa fa-times fa-fw"></i></span> <a href="<?php echo base_url();?>home/page/<?php echo $page['slug'];?>"> <?php echo $page['title'];?></a>
                        <?php endif;?>
                    </td>
                    <td>
                        <?php echo date('d/m/Y', $page['date']);?>
                    </td>
                    <td><a href="<?php echo base_url();?>admin/delete_page/<?php echo $page['id'];?>" class="btn btn-danger btn-xs">Eliminar</a> <a href="<?php echo base_url();?>admin/edit_page/<?php echo $page['id'];?>" class="btn btn-default btn-xs"> Editar</a></td>
					</tr>
                <?php $i++;?>
				<?php endforeach;?>
			</tbody>
        </table>        
    </div>
</section>