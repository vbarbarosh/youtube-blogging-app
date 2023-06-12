import http_post_json from '../../http/http_post_json';

function api_auth_logout()
{
    return http_post_json('/logout');
}

export default api_auth_logout;
