const axios = require('axios');
const token = document.head.querySelector('meta[name="csrf-token"]');
import { url } from '../../config';

if (token) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
    axios.defaults.baseURL = url;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

export {
    axios
}