import axios from 'axios';

function api_articles_list()
{
    return axios.get('/api/v1/articles.json').then(v => v.data);
}

export default api_articles_list;
