import '../sass/tabler.scss';

import './tabler-init';


if (!document.body.classList.contains('login-page')) {
    import('../scss/bootstrap-override.scss');
}

