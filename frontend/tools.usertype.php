<?php
require_once("header.php");
use \packages\userpanel;
use \packages\userpanel\user;
use \packages\base\translator;
use \themes\clipone\utility;
?>
<div class="row">
	<div class="col-md-12">
		<!-- start: BASIC TABLE PANEL -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-users"></i> <?php echo translator::trans('tools'); ?>
				<div class="panel-tools">
					<a class="btn btn-xs btn-link tooltips" title="<?php echo translator::trans('usertype.add'); ?>" data-toggle="modal" href="#permission-add" data-original-title=""><i class="clip-user-plus"></i></a>
					<a class="btn btn-xs btn-link panel-collapse collapses" href="#"></a>
				</div>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover">
						<?php
						$hasButtons = $this->hasButtons();
						?>
						<thead>
							<tr>
								<th>#</th>
								<th><?php echo translator::trans('usertype.title'); ?></th>
								<th><?php echo translator::trans('usertype.permissions'); ?></th>
								<th><?php echo translator::trans('usertype.priority'); ?></th>
								<th><?php echo translator::trans('usertype.options'); ?></th>
								<?php if($hasButtons){ ?><th></th><?php } ?>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach($this->getUserTypes() as $usertype){
								$this->setButtonParam('edit', 'link', userpanel\url("tools/usertype/edit/".$usertype->id));
								$this->setButtonParam('delete', 'link', userpanel\url("tools/usertype/delete/".$usertype->id));
							?>
							<tr>
								<td><?php echo $usertype->id; ?></td>
								<td><?php echo $usertype->title; ?></td>
								<td><?php echo $this->getPermissionsLink(count($usertype->permissions), $usertype->id); ?></td>
								<td><?php echo $this->getPriorityLink(count($usertype->children), $usertype->id); ?></td>
								<td><?php echo $this->getOptionsLink(count($usertype->options), $usertype->id); ?></td>
								<?php
								if($hasButtons){
									echo("<td class=\"center\">".$this->genButtons()."</td>");
								}
								?>
								</tr>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- end: BASIC TABLE PANEL -->
	</div>
</div>
<div class="modal fade" id="permission-add" tabindex="-1" data-show="true" role="dialog">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title"><?php echo translator::trans('usertype.add'); ?></h4>
	</div>
	<div class="modal-body">
		<form id="permission-add-form" action="<?php echo userpanel\url("tools/usertype"); ?>" method="post" class="form-horizontal">
			<?php
			$this->setHorizontalForm('sm-3','sm-9');
			$this->createField(array(
				'label' => translator::trans("usertype.title"),
				'name' => 'title'
			));
			?>
		</form>
	</div>
	<div class="modal-footer">
		<button type="submit" form="permission-add-form" class="btn btn-success"><?php echo translator::trans("add") ?></button>
		<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true"><?php echo translator::trans("dissuasion") ?></button>
	</div>
</div>
<?php
require_once('footer.php');
