<?php
/**
 * Default home template.
 *
 * @package   Luthemes
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright Copyright (C) 2014-2021. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 */
?>
<?php Benlumia007\Alembic\Engine::display( 'header', [], [ 'title' => ! empty( $title ) ? $title : '' ] ); ?>
<section id="content" class="site-content">
    <div id="layout" class="right-sidebar">
        <main id="main" class="content-area">
            <?php foreach ( $entries->all() as $entry ) : ?>
                <?php Benlumia007\Alembic\Engine::display( 'content/default', [ $entry->type()->name() ], [ 'entry' => $entry ] ); ?>
            <?php endforeach ?> 
        </main>
    </div>
</section>
<?php Benlumia007\Alembic\Engine::display( 'footer' ); ?>