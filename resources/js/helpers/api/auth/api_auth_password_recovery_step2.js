import http_post_json from '../../http/http_post_json';

function api_auth_password_recovery_step2(form)
{
    return http_post_json(`/password-recovery/${form.token}`, {password: form.password});
}

export default api_auth_password_recovery_step2;
