import axios from 'axios';

function api_articles_list_published()
{
    return axios.get('/api/v1/articles-published.json').then(v => v.data);
}

export default api_articles_list_published;
