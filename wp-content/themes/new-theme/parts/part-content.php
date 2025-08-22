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
                <?php echo 'columns';
                // while ( have_rows('content') ) : the_row();
                //     switch(get_row_layout()) {
                //         case 'text':
                //             echo 'text';
                //             break;
                //         case 'image':
                //             echo 'image';
                //             break;
                //         case 'blank':
                //             echo 'blank';
                //             break;
                //         }

                // endwhile;
                // Do something...
                ?></section>
            <?php endif;

        // End loop.
        endwhile;
    endif;
?>
