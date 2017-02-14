<section id="entries-sec" class="padding-60">
    <div class="container">
    <?php if($this->session->flashdata('success')):?>
    <div class="alert alert-success alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>¡Éxito!</strong> <?php echo $this->session->flashdata('success');?>
	</div>
	<?php endif;?>
        <div class="text-center">
            <a class="btn btn-primary" href="<?php echo base_url();?>admin/new_user"> Nuevo Usuario </a>
            <hr>
        </div>
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th> # </th>
                    <th> Nombre </th>
                    <th> Correo </th>
                    <th> Acción </th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;?>
                <?php foreach ($usersdata as $user):?>
                <tr>
                    <td>
                        <?php echo $i;?>
                    </td>
                    <td>
                        <?php if ($user['is_active'] == "on"):?>
                        <span class="label label-success"><i data-toggle="tooltip" data-placement="top" data-original-title="Activo" class="fa fa-check fa-fw"></i></span> <a href="<?php echo base_url();?>home/user/<?php echo $user['id'];?>"> <?php echo $user['name'];?></a>
                        <?php else:?>
                        <span class="label label-danger"><i data-toggle="tooltip" data-placement="top" data-original-title="Inactivo" class="fa fa-times fa-fw"></i></span> <a href="<?php echo base_url();?>home/user/<?php echo $user['id'];?>"> <?php echo $user['name'];?></a>
                        <?php endif;?>
                    </td>
                    <td>
                        <?php echo $user['email'];?>
                    </td>
                    <td><a href="<?php echo base_url();?>admin/delete_user/<?php echo $user['id'];?>" class="btn btn-danger btn-xs">Eliminar</a> <a href="<?php echo base_url();?>admin/user/<?php echo $user['id'];?>" class="btn btn-warning btn-xs"> Reestablecer </a> <a href="<?php echo base_url();?>admin/edit_user/<?php echo $user['id'];?>" class="btn btn-default btn-xs"> Editar</a></td>
					</tr>
                <?php $i++;?>
				<?php endforeach;?>
			</tbody>
        </table>        
    </div>
</section>