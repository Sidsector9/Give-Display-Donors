<div class="donor-item">
	<div class="donor-gravatar">
		<?php printf( get_avatar( $email, 64 ) ); ?>
	</div>
	<div class="payments-meta">
		<span class="name"><?php printf( '%s', esc_html( $name ) ); ?></span>
		<span class="ago"><?php printf( '%1$s %2$s', esc_html( $payment_date ), __( 'ago', 'givedd
		' ) ); ?></span>
	</div>
	<div class="donation-price">
		<?php printf( '%1$s <span class="amount">%2$s</span>', esc_html( $payment_currency ), esc_html( round( $payment_total, 2 ) ) ); ?>
	</div>
</div>
