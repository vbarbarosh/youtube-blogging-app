import http_post_json from '../../http/http_post_json';

function api_auth_login({email, password})
{
    return http_post_json('/login', {email, password});
}

export default api_auth_login;
