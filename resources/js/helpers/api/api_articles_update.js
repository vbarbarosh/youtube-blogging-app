import axios from 'axios';

function api_articles_update(article)
{
    return axios.patch(`/api/v1/articles/${article.uid}`, article);
}

export default api_articles_update;
