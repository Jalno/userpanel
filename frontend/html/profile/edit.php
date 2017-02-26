<?php
$this->the_header();
use \packages\base;
use \packages\base\translator;
use \packages\userpanel;
use \packages\userpanel\user\socialnetwork;
?>
<!-- start: PAGE CONTENT -->
<div class="row">
	<div class="col-sm-12">
		<div class="tabbable">
			<ul class="nav nav-tabs tab-padding tab-space-3 tab-blue">
				<li><a  href="<?php echo userpanel\url('profile/view'); ?>"><?php echo translator::trans("profile.view"); ?></a></li>
				<li class="active"><a href="<?php echo userpanel\url('profile/edit'); ?>"><?php echo translator::trans("profile.edit"); ?></a></li>
			</ul>
			<div class="tab-content">
				<div id="edit_panel" class="tab-pane active">
					<form action="<?php echo userpanel\url('profile/edit'); ?>" method="POST" role="form" id="edit_form">
						<?php
						if($this->canEditPrivacy){
							foreach(array(
								'email',
								'cellphone',
								'phone',
								'socialnetworks_'.socialnetwork::telegram,
								'socialnetworks_'.socialnetwork::instagram,
								'socialnetworks_'.socialnetwork::skype,
								'socialnetworks_'.socialnetwork::twitter,
								'socialnetworks_'.socialnetwork::facebook,
								'socialnetworks_'.socialnetwork::gplus,
							) as $field){
								$this->createField(array(
									'type' => 'hidden',
									'name' => "visibility_".$field
								));

							}
						}
						?>
						<div class="row">
							<div class="col-md-12">
								<h3>اطلاعات پایه</h3>
								<hr>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<?php
								$fields = array(
									array(
										'name' => 'name',
										'label' => translator::trans("user.name")
									),
									array(
										'name' => 'lastname',
										'label' => translator::trans("user.lastname")
									),
									array(
										'type' => 'email',
										'name' => 'email',
										'label' => translator::trans("user.email"),
										'readonly' => true,
										'ltr' => true,
										'error' => array(
											'data_duplicate' => 'user.email.data_duplicate'
										),
										'input-group' => $this->getFieldPrivacyGroupBtn('email')
									),
									array(
										'name' => 'cellphone',
										'label' => translator::trans("user.cellphone"),
										'readonly' => true,
										'ltr' => true,
										'error' => array(
											'data_duplicate' => 'user.cellphone.data_duplicate'
										),
										'input-group' => $this->getFieldPrivacyGroupBtn('cellphone')
									),
									array(
										'type' => 'password',
										'name' => 'password',
										'label' => translator::trans("user.password"),
										'value' => ''
									),
									array(
										'type' => 'password',
										'name' => 'password2',
										'label' => translator::trans("user.password_repeat"),
										'value' => ''
									)
								);
								foreach($fields as $field){
									$this->createField($field);
								}
								?>
							</div>
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-4">
										<?php
										$this->createField(array(
											'type' => 'select',
											'name' => 'country',
											'label' => translator::trans("user.country"),
											'options' => $this->getCountriesForSelect()
										));
										?>
									</div>
									<div class="col-md-4">
										<?php
										$this->createField(array(
											'name' => 'city',
											'label' => translator::trans("user.city")
										));
										?>
									</div>
									<div class="col-md-4">
										<?php
										$this->createField(array(
											'type' => 'number',
											'name' => 'zip',
											'label' => translator::trans("user.zip"),
											'ltr' => true
										));
										?>
									</div>
								</div>
								<?php
								$fields = array(
									array(
										'name' => 'address',
										'label' => translator::trans("user.address")
									),
									array(
										'name' => 'phone',
										'label' => translator::trans("user.phone"),
										'ltr' => true,
										'input-group' => $this->getFieldPrivacyGroupBtn('phone')
									)
								);
								foreach($fields as $field){
									$this->createField($field);
								}
								?>
								<div class="form-group">
									<label>چهرک</label>
									<div class="fileupload fileupload-new" data-provides="fileupload">
										<div class="fileupload-new thumbnail" style="width: 150px; height: 150px;">
											<img src="<?php echo $this->getAvatarURL(); ?>"   style="width: 150px; height: 150px;" alt="">
										</div>
										<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 150px; max-height: 150px; line-height: 20px;"></div>
										<div class="user-edit-image-buttons">
											<span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture"></i>بارگذاری چهرک</span><span class="fileupload-exists"><i class="fa fa-picture"></i> تغییر</span>
												<input type="file" name="avatar">
											</span>
											<a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
												<i class="fa fa-times"></i>حذف
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<h3>شبکه های اجتماعی</h3>
								<hr>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<?php
								$fields = array(
									array(
										'name' => 'socialnets['.socialnetwork::telegram.']',
										'placeholder' => "Telegram",
										'icon' => 'fa fa-telegram',
										'ltr' => true,
										'input-group' => $this->getFieldPrivacyGroupBtn('socialnetworks_'.socialnetwork::telegram)
									),
									array(
										'name' => 'socialnets['.socialnetwork::instagram.']',
										'placeholder' => "Instagram",
										'icon' => 'fa fa-instagram',
										'ltr' => true,
										'input-group' => $this->getFieldPrivacyGroupBtn('socialnetworks_'.socialnetwork::instagram)
									),
									array(
										'name' => 'socialnets['.socialnetwork::skype.']',
										'placeholder' => "Skype",
										'icon' => 'fa fa-skype',
										'ltr' => true,
										'input-group' => $this->getFieldPrivacyGroupBtn('socialnetworks_'.socialnetwork::skype)
									)
								);
								foreach($fields as $field){
									$this->createField($field);
								}
								?>
							</div>
							<div class="col-md-6">
								<?php
								$fields = array(
									array(
										'name' => 'socialnets['.socialnetwork::twitter.']',
										'placeholder' => "Twitter",
										'icon' => 'clip-twitter',
										'ltr' => true,
										'input-group' => $this->getFieldPrivacyGroupBtn('socialnetworks_'.socialnetwork::twitter)
									),
									array(
										'name' => 'socialnets['.socialnetwork::facebook.']',
										'placeholder' => "Facebook",
										'icon' => 'clip-facebook',
										'ltr' => true,
										'input-group' => $this->getFieldPrivacyGroupBtn('socialnetworks_'.socialnetwork::facebook)
									),
									array(
										'name' => 'socialnets['.socialnetwork::gplus.']',
										'placeholder' => "Google+",
										'icon' => 'fa fa-google-plus',
										'ltr' => true,
										'input-group' => $this->getFieldPrivacyGroupBtn('socialnetworks_'.socialnetwork::gplus)
									)

								);
								foreach($fields as $field){
									$this->createField($field);
								}
								?>
							</div>
						</div>
						<div class="row" style="margin-top: 20px;margin-bottom: 20px;">
							<div class="col-md-offset-4 col-md-4">
								<button class="btn btn-teal btn-block" type="submit"><i class="fa fa-arrow-circle-left"></i> <?php echo translator::trans("user.profile.save"); ?></button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
$this->the_footer();