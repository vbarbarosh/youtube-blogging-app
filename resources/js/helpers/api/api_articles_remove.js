import axios from 'axios';

function api_articles_remove(article)
{
    return axios.delete(`/api/v1/articles/${article.uid}`);
}

export default api_articles_remove;
