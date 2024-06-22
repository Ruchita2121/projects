<?php echo "header.php"?>
		<div class="responsive-menu">
			<a href="" class="responsive-menu-close"><i class="fa fa-times"></i></a>
			<nav class="responsive-nav"></nav> <!-- end .responsive-nav -->
		</div> <!-- end .responsive-menu -->


		<div class="page-title" style="background-image: url('images/background03.png');">
			<div class="inner">
				<h1>Contact Us</h1>
			</div> <!-- end .inner -->
		</div> <!-- end .section -->

		<div class="full-width-map" id="full-width-map"></div>

		<div class="split-section">
			<div class="inner">
				<div class="split-section-section one-fourth blue text-center no-padding" >
					<div class="inner">
						<div class="contact-info">
							<h3>Special Offer</h3>
							<p>Flatnin' the hills Someday the mountain might get ‘em but the law never will. Makin their way the only way they know how. That's just a the law will allow.</p>
							<a href="" class="outline-button">See More</a>
						</div> <!-- end .contact-info -->
					</div> <!-- end .inner -->
				</div> <!-- end .split-section-section -->
				<div class="split-section-section three-fourths light">
					<div class="inner">
						<form action="scripts/contact.php" method="post" id="contact-form">
							<fieldset>
								<legend>Get In Touch With Us</legend>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Name</label>
											<input type="text" id="contact-name" name="contact-name" required>
										</div> <!-- end .form-group -->
									</div> <!-- end .col-sm-6 -->
									<div class="col-sm-6">
										<div class="form-group">
											<label>Email Address</label>
											<input type="email" id="contact-email" name="contact-email" required>
										</div> <!-- end .form-group -->
									</div> <!-- end .col-sm-6 -->
									<div class="col-sm-6">
										<div class="form-group">
											<label>phone</label>
											<input type="tel" id="contact-phone" name="contact-phone">
										</div> <!-- end .form-group -->
									</div> <!-- end .col-sm-6 -->
									<div class="col-sm-6">
										<div class="form-group">
											<label>subject</label>
											<input type="text" id="contact-subject" name="contact-subject">
										</div> <!-- end .form-group -->
									</div> <!-- end .col-sm-6 -->
									<div class="col-sm-12">
										<div class="form-group">
											<label>Your Message</label>
											<textarea name="contact-message" id="contact-message" required rows="3"></textarea>
										</div> <!-- end .form-group -->
									</div> <!-- end .col-sm-12 -->
								</div> <!-- end .row -->
							</fieldset>
							<button type="submit" class="button">Send Message</button>
							<div id="contact-loading" class="alert alert-info form-alert">
								<span class="message">Loading...</span>
							</div>
							<div id="contact-success" class="alert alert-success form-alert">
								<span class="message">Success!</span>
							</div>
							<div id="contact-error" class="alert alert-danger form-alert">
								<span class="message">Error!</span>
							</div>
						</form>
					</div> <!-- end .inner -->
				</div> <!-- end .split-section-section -->
			</div> <!-- end .inner -->
		</div> <!-- end .split-section -->

		<div class="section white">
			<div class="inner">
				<div class="container">
					<div class="row aligned-cols contacts">
						<div class="col-sm-3 aligned-middle">
							<h3>Contact Us</h3>
						</div> <!-- end .col-sm-3 -->
						<div class="col-sm-3 aligned-middle">
							<i class="icon-pointer"></i>
							<h6>Visit Us</h6>
							<p>09 Constructor DLC, Design Street, Victoria, Australia.</p>
						</div> <!-- end .col-sm-3 -->
						<div class="col-sm-3 aligned-middle">
							<i class="icon-clock"></i>
							<h6>working hours</h6>
							<p>Mon - Fri : 9:00 AM - 9:00 PM<br>Sat : 9:00 AM - 2:00 PM</p>
						</div> <!-- end .col-sm-3 -->
						<div class="col-sm-3 aligned-middle">
							<i class="icon-call-end"></i>
							<h6>call us</h6>
							<p>+91 123 456 78<br>+91 123 456 89</p>
						</div> <!-- end .col-sm-3 -->
					</div> <!-- end .row -->
				</div> <!-- end .container -->
			</div> <!-- end .inner -->
		</div> <!-- end .section -->
<?php echo "footer.php"?>