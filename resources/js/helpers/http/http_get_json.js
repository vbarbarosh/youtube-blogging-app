import axios from 'axios';

function http_get_json(url, options)
{
    return axios.get(url, options).then(v => v.data);
}

export default http_get_json;
