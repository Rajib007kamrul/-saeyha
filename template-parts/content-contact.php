<?php
    $title        =  get_theme_mod('contact_section_title');
    $contact_img   = get_theme_mod('contact_upload');
    $contact_img2  = get_theme_mod('contact_upload2');

    if( empty( $contact_img ) ) {
      $contact_img =  get_template_directory_uri() . '/assets/img/form/1.png';
    }

    if( empty( $contact_img2 ) ) {
      $contact_img2 =  get_template_directory_uri() . '/assets/img/form/2.png';
    }
?>

<div class="section" id="section3">
    <img class="form-shape-1" src="<?php echo $contact_img; ?>" alt="img">
    <img class="form-shape-2" src="<?php echo $contact_img2; ?>" alt="img">
    <!-- contact-area start -->
    <div class="contact-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 contact-form-wrap">
                    <div class="section-title text-center mb-3">
                        <h3> <?php echo $title; ?> </h3>
                    </div>
                    <form>
                        <input id="contact_name"  type="text" placeholder="" value="" />
                        <input id="contact_email" type="text" placeholder="" value="" />
                        <input type="text" placeholder="" value="" />
                        <input type="text" placeholder="" value="" />
                        <textarea id="contact_message"></textarea>
                        <div class="btn-wrap text-center">
                            <button type="submit" class="btn btn-white-border contact_submit"> Submit </button>
                            <!-- <a class="btn btn-white-border" href="#">Submit</a> -->
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 offset-lg-2">
                    <h2><span>A WORLD OF</span> <br/> OPPORTUNITIES AWAITS YOU.</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- contact-area start -->
</div>