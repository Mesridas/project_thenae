 <!-- Formulaire de contact  -->

<section id="contactme">
	<div class="container">
		<div class="container-contact100">            
        <?php if(isset($_SESSION['thenae']['errors'])): ?>
          <div class="alert alert-warning">
            <?php echo implode('<br>', $_SESSION['thenae']['errors']); ?>
          </div>
        <?php endif; ?>

        <?php if(isset($_SESSION['thenae']['success'])): ?>
          <div class="alert alert-success">
            Votre message a bien été envoyé !
          </div>
        <?php endif; ?>

			<form action="index.php?ctrl=order&action=store" method="POST" class="contact100-form validate-form">
				<span class="contact100-form-title">
					Me contacter
				</span>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Un nom est requis">
					<span class="label-input100">Votre nom</span>
                    <input class="input100" type="text" name="name" placeholder="Dites moi qui vous êtes" value="<?php echo isset($_SESSION['thenae']['data_memory']['name']) ? $_SESSION['thenae']['data_memory']['name'] : ''; ?>" required>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate = "Une adresse mail valide est requise : exemple@abc.fr">
					<span class="label-input100">Email</span>
					<input class="input100" type="text" name="email" placeholder="Renseignez votre email" value="<?php echo isset($_SESSION['thenae']['data_memory']['email']) ? $_SESSION['thenae']['data_memory']['email'] : ''; ?>"  required>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Un message est requis">
					<span class="label-input100">Message</span>
					<textarea class="input100" name="message" placeholder="Contactez moi pour une commande, où en savoir plus sur mon travail"><?php echo isset($_SESSION['thenae']['data_memory']['message']) ? $_SESSION['thenae']['data_memory']['message'] : '' ; ?>
					</textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" type="submit">
						<span>
							Envoyer
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
      </form>

			<span class="contact100-more">
				Pour plus d'informations à propos de vos envies ou de mes créations : <span class="contact100-more-highlight">contact@thenaecreations.fr</span>
			</span>
		</div>

	</div>
</section>