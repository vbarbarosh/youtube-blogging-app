import http_get_json from './http/http_get_json';

function api_users_me()
{
    return http_get_json('/api/v1/users/me.json');
}

export default api_users_me;
