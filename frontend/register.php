<?php
use \packages\base;
use \packages\base\frontend\theme;
use \packages\base\translator;
use \packages\userpanel;
$this->the_header('login');
?>
<!-- start: REGISTER BOX -->
<div class="box-register" style="display: block;">
	<h3><?php echo translator::trans('register.title'); ?></h3>
	<p><?php echo translator::trans('register.enterdata'); ?></p>
	<form class="form-register" action="<?php echo userpanel\url('register'); ?>" method="post">
		<div class="errorHandler alert alert-danger no-display">
			<i class="fa fa-remove-sign"></i> <?php echo translator::trans('register.error.recheck'); ?>
		</div>
		<fieldset>
			<div class="row">
				<div class="col-md-6">
					<?php
					$this->createField(array(
						'name' => 'name',
						'placeholder' => translator::trans('register.user.name')
					));
					?>
				</div>
				<div class="col-md-6">
					<?php
					$this->createField(array(
						'name' => 'lastname',
						'placeholder' => translator::trans('register.user.lastname')
					));
					?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<?php
					$this->createField(array(
						'type' => 'select',
						'name' => 'country',
						'placeholder' => translator::trans('register.user.country'),
						'options' => $this->countries
					));
					?>
				</div>
				<div class="col-md-6">
					<?php
					$this->createField(array(
						'name' => 'city',
						'placeholder' => translator::trans('register.user.city')
					));
					?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<?php
					$this->createField(array(
						'name' => 'address',
						'placeholder' => translator::trans('register.user.address')
					));
					?>
				</div>
				<div class="col-md-6">
					<?php
					$this->createField(array(
						'name' => 'zip',
						'placeholder' => translator::trans('register.user.zip')
					));
					?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<?php
					$this->createField(array(
						'name' => 'phone',
						'placeholder' => translator::trans('register.user.phone')
					));
					?>
				</div>
				<div class="col-md-6">
					<?php
					$this->createField(array(
						'name' => 'cellphone',
						'placeholder' => translator::trans('register.user.cellphone')
					));
					?>
				</div>
			</div>
			<?php
			$this->createField(array(
				'name' => 'email',
				'type' => 'email',
				'icon' => 'fa fa-envelope',
				'placeholder' => translator::trans('register.user.email')
			));
			$this->createField(array(
				'name' => 'password',
				'type' => 'password',
				'icon' => 'fa fa-lock',
				'placeholder' => translator::trans('register.user.password')
			));
			$this->createField(array(
				'name' => 'password_again',
				'type' => 'password',
				'icon' => 'fa fa-lock',
				'placeholder' => translator::trans('register.user.password_again')
			));
			$this->createField(array(
				'name' => 'tos',
				'type' => 'checkbox',
				'inline' => true,
				'options' => array(
					array(
						'value' => '1',
						'label' => translator::trans('register.accept_tos')
					)
				)
			));
			?>

			<div class="form-actions">
				<a class="btn btn-light-grey" href="<?php echo userpanel\url('login'); ?>"> <i class="fa fa-arrow-circle-right"></i> <?php echo translator::trans('back'); ?></a>
				<button type="submit" class="btn btn-bricky pull-left"> <i class="fa fa-arrow-circle-left"></i> <?php echo translator::trans('register'); ?></button>
			</div>
		</fieldset>
	</form>
</div>
<!-- end: REGISTER BOX -->
<?php $this->the_footer('login'); ?>