import '../sass/tabler.scss';
import * as bootstrap from 'bootstrap';
import './tabler-init';
// resources/js/app.js

if (!document.body.classList.contains('login-page')) {
    import('../scss/bootstrap-override.scss');
}

