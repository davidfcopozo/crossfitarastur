<section class="contact_section layout_padding section-padding30">
    <div class="container">
        <div class="heading_container section-tittle">
            <h2>
                <span>
                    ¡Ponte en contacto con nosotros!
                </span>
            </h2>
        </div>
        <div class="layout_padding2-top">
            <div class="row">
                <div class="col-md-6 ">
                    <p><span class="asterik">*</span> Campos obligatorios</p>
                    <form class="needs-validation" id="form-scroll" novalidate>
                        <div class="contact_form-container">
                            <div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" placeholder="Juan Pérez" id="floatingInput" name="name" required>
                                    <label for="floatingInput">Nombre <span class="asterik">*</span></label>
                                    <div class="valid-feedback">
                                        ¡Muy bien!
                                    </div>
                                    <div class="invalid-feedback">
                                        Por favor, escriba un nombre válido.
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="ejemplo@correo.es" required>
                                    <label for="floatingInput">Correo electrónico <span class="asterik">*</span></label>
                                    <div class="valid-feedback">
                                        ¡Muy bien!
                                    </div>
                                    <div class="invalid-feedback">
                                        Por favor, escriba un correo electrónico válido.
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" name="phone" class="form-control" placeholder="123 456 789 (Sin espacios)">
                                    <label for="floatingInput">123 456 789 (Sin espacios)</label>
                                </div>
                                <div class="form-floating mb-3 mt-5">
                                    <input type="text" class="form-control" name="message" placeholder="Mensaje a enviar..." value="<?php echo isset($_GET['message']) ? htmlspecialchars($_GET['message']) : ''; ?>" required>
                                    <label for="floatingInput">Mensaje <span class="asterik">*</span></label>
                                    <div class="valid-feedback">
                                        ¡Muy bien!
                                    </div>
                                    <div class="invalid-feedback">
                                        Por favor, escriba su mensaje.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <input id="agree" name="agree" class="form-check-input" type="checkbox" required="">
                                    <label for="agree" class="d-inline form-check-label my-auto">Acepto la <a href="politica-de-privacidad.php" target="_blank" rel="noopener noreferrer"> política de privacidad</a>.</label>
                                    <div class="invalid-feedback">Acepta la a política de privacidad.
                                    </div>
                                </div>
                                <input type="hidden" name="recaptcha_response" id="recaptchaResponse">

                                <div class="fancy">
                                    <span class="top-key"></span>
                                    <button>
                                        <span class="text">Enviar</span>
                                    </button>
                                    <span class="bottom-key-1"></span>
                                    <span class="bottom-key-2"></span>
                                </div>
                            </div>
                        </div>
                        <p class="recaptcha-invisible">reCAPTCHA invisible de Google <a id="captcha_privacy_link" href="https://policies.google.com/privacy" target="_blank" rel="noopener noreferrer" class="text-white">Política de privacidad</a> y <a id="captcha_terms_link" href="https://policies.google.com/terms" target="_blank" rel="noopener noreferrer" class="text-white">Condiciones de uso</a>. </p>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="map_container">
                        <div class="map-responsive">
                            <iframe title="Dirección de Crossfit Arastur en mapa de Google" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2981.927459628159!2d-0.9904018237100229!3d41.63569938055576!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd596919b60c9bdb%3A0x3f9bd97b33711d8!2sCrossFit%20Arastur!5e0!3m2!1ses!2ses!4v1738586344874!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
                <!-- Modal feedback  -->
                <div class="modal fade" id="feedback" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title" id="myModalLabel">¡Gracias!</h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Hemos recibido tu mensaje.
                            </div>
                            <div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>