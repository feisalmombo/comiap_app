const root = "https://covitece.com"
const api_url = root + "/api"

const endpoints =  {
    questions: questions,
}

export default endpoints

const questions = {
    update: (id) => {
        return {
            url: api_url + "/questions/" + id,
            method: "post"
        }
    },
    store: {
        url: api_url + "/questions",
        method: "post"
    },
    index: {
        url: api_url + "/questions",
        method: "get"
    },
    delete: (id) => {
        return {
            url: api_url + "/questions/" + id,
            method: "delete"
        }
    }
}

export const sites_api = {
    search: {
        url: api_url + "/search/testing-sites",
        method: "post"
    },
}