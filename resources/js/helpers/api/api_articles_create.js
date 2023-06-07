import axios from 'axios';

function api_articles_create(article)
{
    return axios.post('/api/v1/articles', article).then(v => v.data);
}

export default api_articles_create;
