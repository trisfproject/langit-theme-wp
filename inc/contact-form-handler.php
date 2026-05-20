<?php
/**
 * Native Contact form submission handler.
 *
 * @package Langit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return the contact form redirect URL with a status flag.
 *
 * @param string $status Submission status.
 * @return string
 */
function langit_contact_form_redirect_url( $status ) {
	$redirect = wp_get_referer();

	if ( empty( $redirect ) ) {
		$redirect = home_url( '/contact/' );
	}

	$redirect = remove_query_arg( array( 'langit_contact_status' ), $redirect );

	return add_query_arg( 'langit_contact_status', sanitize_key( $status ), $redirect );
}

/**
 * Redirect a contact form submission with a status code.
 *
 * @param string $status Submission status.
 */
function langit_contact_form_redirect( $status ) {
	wp_safe_redirect( langit_contact_form_redirect_url( $status ) );
	exit;
}

/**
 * Build the HTML email body for a contact inquiry.
 *
 * @param array<string,string> $fields Sanitized submission fields.
 * @return string
 */
function langit_contact_form_email_body( $fields ) {
	$rows = array(
		__( 'Name', 'langit' )         => $fields['name'],
		__( 'Company', 'langit' )      => $fields['company'],
		__( 'Email', 'langit' )        => $fields['email'],
		__( 'Phone', 'langit' )        => $fields['phone'],
		__( 'Inquiry Type', 'langit' ) => $fields['inquiry_type'],
		__( 'Message', 'langit' )      => nl2br( esc_html( $fields['message'] ) ),
		__( 'Submitted At', 'langit' ) => current_time( 'mysql' ),
	);

	ob_start();
	?>
	<div style="font-family:Arial,sans-serif;color:#0f172a;line-height:1.6;">
		<h2 style="margin:0 0 16px;color:#0f172a;"><?php esc_html_e( 'New Contact Inquiry', 'langit' ); ?></h2>
		<p style="margin:0 0 20px;color:#475569;">
			<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
		</p>
		<table style="width:100%;border-collapse:collapse;border:1px solid #dbe4ee;">
			<tbody>
				<?php foreach ( $rows as $label => $value ) : ?>
					<tr>
						<th style="width:180px;padding:12px;border:1px solid #dbe4ee;background:#f8fafc;text-align:left;vertical-align:top;">
							<?php echo esc_html( $label ); ?>
						</th>
						<td style="padding:12px;border:1px solid #dbe4ee;vertical-align:top;">
							<?php echo wp_kses_post( '' === $value ? '-' : $value ); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<?php
	return (string) ob_get_clean();
}

/**
 * Process native Contact form submissions.
 */
function langit_handle_contact_form_submission() {
	if ( ! isset( $_POST['langit_contact_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['langit_contact_nonce'] ) ), 'langit_contact_form' ) ) {
		langit_contact_form_redirect( 'error' );
	}

	if ( ! empty( $_POST['langit_contact_website'] ) ) {
		langit_contact_form_redirect( 'error' );
	}

	$fields = array(
		'name'         => isset( $_POST['langit_contact_name'] ) ? sanitize_text_field( wp_unslash( $_POST['langit_contact_name'] ) ) : '',
		'company'      => isset( $_POST['langit_contact_company'] ) ? sanitize_text_field( wp_unslash( $_POST['langit_contact_company'] ) ) : '',
		'email'        => isset( $_POST['langit_contact_email'] ) ? sanitize_email( wp_unslash( $_POST['langit_contact_email'] ) ) : '',
		'phone'        => isset( $_POST['langit_contact_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['langit_contact_phone'] ) ) : '',
		'inquiry_type' => isset( $_POST['langit_contact_inquiry_type'] ) ? sanitize_text_field( wp_unslash( $_POST['langit_contact_inquiry_type'] ) ) : '',
		'message'      => isset( $_POST['langit_contact_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['langit_contact_message'] ) ) : '',
	);

	if ( empty( $fields['name'] ) || empty( $fields['email'] ) || empty( $fields['inquiry_type'] ) || empty( $fields['message'] ) || ! is_email( $fields['email'] ) ) {
		langit_contact_form_redirect( 'error' );
	}

	$recipient = sanitize_email( langit_theme_mod( 'contact_form_recipient_email' ) );

	if ( empty( $recipient ) || ! is_email( $recipient ) ) {
		$recipient = get_option( 'admin_email' );
	}

	$subject_prefix = sanitize_text_field( langit_theme_mod( 'contact_form_subject_prefix' ) );
	$subject        = trim( $subject_prefix . ' ' . $fields['inquiry_type'] );
	$headers        = array(
		'Content-Type: text/html; charset=UTF-8',
		'Reply-To: ' . $fields['name'] . ' <' . $fields['email'] . '>',
	);
	$cc_emails = array_filter( array_map( 'trim', explode( ',', langit_theme_mod( 'contact_form_cc_email' ) ) ) );
	$cc_emails = array_filter( array_map( 'sanitize_email', $cc_emails ), 'is_email' );

	if ( ! empty( $cc_emails ) ) {
		$headers[] = 'Cc: ' . implode( ', ', $cc_emails );
	}

	$sent = wp_mail( $recipient, $subject, langit_contact_form_email_body( $fields ), $headers );

	langit_contact_form_redirect( $sent ? 'success' : 'error' );
}
add_action( 'admin_post_langit_contact_form_submit', 'langit_handle_contact_form_submission' );
add_action( 'admin_post_nopriv_langit_contact_form_submit', 'langit_handle_contact_form_submission' );
