(function () {
	const toggle = document.querySelector('[data-nav-toggle]');
	const menu = document.querySelector('[data-primary-menu]');

	if (!toggle || !menu) {
		return;
	}

	const closeMenu = function () {
		toggle.setAttribute('aria-expanded', 'false');
		menu.classList.remove('is-open');
		document.body.classList.remove('has-open-menu');
	};

	toggle.addEventListener('click', function () {
		const shouldOpen = toggle.getAttribute('aria-expanded') !== 'true';

		toggle.setAttribute('aria-expanded', String(shouldOpen));
		menu.classList.toggle('is-open', shouldOpen);
		document.body.classList.toggle('has-open-menu', shouldOpen);
	});

	document.addEventListener('keydown', function (event) {
		if (event.key === 'Escape') {
			closeMenu();
		}
	});

	document.addEventListener('click', function (event) {
		if (!menu.classList.contains('is-open')) {
			return;
		}

		if (!menu.contains(event.target) && !toggle.contains(event.target)) {
			closeMenu();
		}
	});

	menu.addEventListener('click', function (event) {
		if (event.target.closest('a')) {
			closeMenu();
		}
	});

	window.addEventListener('resize', function () {
		if (window.matchMedia('(min-width: 901px)').matches) {
			closeMenu();
		}
	});
})();
