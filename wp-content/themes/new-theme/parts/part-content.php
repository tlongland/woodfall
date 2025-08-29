<?php
    if( have_rows('content') ):

        // Loop through rows.
        while ( have_rows('content') ) : the_row();

            // Case: Paragraph layout.
            if( get_row_layout() == 'hero' ): ?>
                <section>
                <?php print_r('hero'); ?>
                </section>
            <?php elseif( get_row_layout() == 'columns' ): ?>
                <section>
                    <?php if (have_rows('column_content')) : ?>
                        <?php while(have_rows('column_content')) : the_row(); ?>
                            <div class="col">
                            <?php switch(get_row_layout()) {
                                case 'text':
                                    echo 'text';
                                    break;
                                case 'image':
                                    echo 'image';
                                    break;
                                case 'blank':
                                    echo 'blank';
                                    break;
                                }?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </section>
            <?php endif;

        // End loop.
        endwhile;
    endif;
?>
