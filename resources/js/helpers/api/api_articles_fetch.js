import axios from 'axios';

function api_articles_fetch(article)
{
    return axios.get(`/api/v1/articles/${article.uid}.json`).then(v => v.data);
}

export default api_articles_fetch;
