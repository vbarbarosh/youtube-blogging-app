import http_post_json from '../../http/http_post_json';

function api_auth_register({email, password})
{
    return http_post_json('/register', {email, password});
}

export default api_auth_register;
