(function () {
	const header = document.querySelector('.site-header');
	const toggle = document.querySelector('[data-nav-toggle]');
	const menu = document.querySelector('[data-primary-menu]');
	const heroBackgrounds = Array.from(document.querySelectorAll('[data-hero-backgrounds] .hero-backgrounds__image'));

	if (!toggle || !menu) {
		return;
	}

	const submenuItems = Array.from(menu.querySelectorAll('.menu-item-has-children'));
	const isDesktop = function () {
		return window.matchMedia('(min-width: 901px)').matches;
	};

	const setHeaderState = function () {
		if (!header) {
			return;
		}

		header.classList.toggle('is-scrolled', window.scrollY > 8);
	};

	const setSubmenuState = function (item, shouldOpen) {
		const button = item.querySelector(':scope > .submenu-toggle');
		const submenu = item.querySelector(':scope > .sub-menu');

		if (!button || !submenu) {
			return;
		}

		item.classList.toggle('is-submenu-open', shouldOpen);
		button.setAttribute('aria-expanded', String(shouldOpen));

		if (isDesktop()) {
			submenu.hidden = false;
		} else {
			submenu.hidden = !shouldOpen;
		}
	};

	const closeMenu = function () {
		toggle.setAttribute('aria-expanded', 'false');
		menu.classList.remove('is-open');
		document.body.classList.remove('has-open-menu');
		submenuItems.forEach(function (item) {
			setSubmenuState(item, false);
		});
	};

	submenuItems.forEach(function (item, index) {
		const link = item.querySelector(':scope > a');
		const submenu = item.querySelector(':scope > .sub-menu');

		if (!link || !submenu) {
			return;
		}

		const button = document.createElement('button');
		const submenuId = submenu.id || 'primary-submenu-' + index;

		submenu.id = submenuId;
		button.type = 'button';
		button.className = 'submenu-toggle';
		button.setAttribute('aria-expanded', 'false');
		button.setAttribute('aria-controls', submenuId);
		button.setAttribute('aria-label', 'Toggle ' + link.textContent.trim() + ' submenu');
		button.innerHTML = '<span aria-hidden="true"></span>';

		link.insertAdjacentElement('afterend', button);
		setSubmenuState(item, false);

		button.addEventListener('click', function () {
			const shouldOpen = button.getAttribute('aria-expanded') !== 'true';

			submenuItems.forEach(function (currentItem) {
				if (currentItem !== item) {
					setSubmenuState(currentItem, false);
				}
			});

			setSubmenuState(item, shouldOpen);
		});
	});

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
		submenuItems.forEach(function (item) {
			setSubmenuState(item, false);
		});

		if (isDesktop()) {
			closeMenu();
		}
	});

	window.addEventListener('scroll', setHeaderState, { passive: true });
	setHeaderState();

	if (heroBackgrounds.length > 1 && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
		let activeHeroBackground = 0;

		window.setInterval(function () {
			heroBackgrounds[activeHeroBackground].classList.remove('is-active');
			activeHeroBackground = (activeHeroBackground + 1) % heroBackgrounds.length;
			heroBackgrounds[activeHeroBackground].classList.add('is-active');
		}, 5200);
	}
})();
