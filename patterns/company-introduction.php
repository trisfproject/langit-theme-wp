<?php
/**
 * Title: Langit company introduction
 * Slug: langit/company-introduction
 * Categories: langit
 * Description: A company introduction section with text and a responsive media frame.
 * Keywords: company, about, introduction
 * Viewport Width: 1280
 *
 * @package Langit
 */

$langit_pattern_image = esc_url( get_template_directory_uri() . '/assets/images/langit-project-1200.jpg' );
?>
<!-- wp:group {"className":"section section--surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group section section--surface"><!-- wp:group {"className":"container split-layout","layout":{"type":"default"}} -->
<div class="wp-block-group container split-layout"><!-- wp:group {"className":"section-heading stack","layout":{"type":"constrained","justifyContent":"left"}} -->
<div class="wp-block-group section-heading stack"><!-- wp:paragraph {"className":"section-eyebrow"} -->
<p class="section-eyebrow">Company Introduction</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2>Technology Partner for Modern Facilities</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>PT Global Teknindo berfokus pada perencanaan, instalasi, integrasi, dan pemeliharaan sistem teknologi gedung dengan standar kerja terukur, dokumentasi jelas, serta hasil yang mudah dioperasikan.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:image {"sizeSlug":"large","className":"media-frame"} -->
<figure class="wp-block-image size-large media-frame"><img src="<?php echo $langit_pattern_image; ?>" alt="Teknisi mengerjakan instalasi sistem teknologi gedung"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
