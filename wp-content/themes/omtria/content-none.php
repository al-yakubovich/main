<section class="content-box content-box--default content-box--lg text--center">
    <div class="row">
        <div class="col-md-8 col-sm-12 col-md-offset-2">
            <header>
                <h1 class="content-box-title">
                    <?php
                        if (is_home() && current_user_can('publish_posts')) {
                            esc_html_e('There is no post', 'omtria');
                        } else if (is_search()) {
                            esc_html_e('Nothing found', 'omtria');
                        } else {
                            esc_html_e('Nothing found', 'omtria');
                        }
                    ?>

                </h1>
            </header>
            <div class="content-box-content">
                <?php
                    if (is_home() && current_user_can('publish_posts')) {
                        echo "<p>".__('Are you ready to publish your first post?', 'omtria')."</p>";
                        echo "<p><a href='".esc_url(admin_url('post-new.php'))."' class='button button--default'>".__('Add post', 'omtria')."</a></p>";
                    } else if (is_search()) {
                        echo "<p>".__('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'omtria')."</p>";
                        get_search_form();
                    } else {
                        echo "<p>".__('It seems we can not find what you are looking for. Try to search.', 'omtria')."</p>";
                        get_search_form();
                    }
                ?>
            </div>
        </div>
    </div>
</section>