import Axios from "axios"

const base = "http://127.0.0.1:8000/api"
const api = {
    questionnaires: {
        index: base + "/questionnaires",
        show: base + "/questionnaires/show",

    },
    questions: {
        index: base + "/questions",
        show: base + "/questions/show"
    },
    choices: {
        index: base + "/choices",
        show: base + "/choices/show"
    },
    groups: {
        index: base + "/groups",
        show: base + "/groups/show"
    }
}

export const getQuestionnaires = () => {
    return callApi(api.questionnaires.index)
}

export const addQuestionnaires = (data) => {
    return callApi(api.questionnaires.index, "post", data)
}

export const updateQuestionnaires = (id, data) => {
    return callApi(api.questionnaires.index + "/" + id, "post", {_method:"patch", ...data})
}

export const deleteQuestionnaires = (id) => {
    return callApi(api.questionnaires.index + "/" + id, "delete")
}

export const attachQuestionsToQuestionnaires = (id, data) => {
    return callApi(api.questionnaires.index + "/" + id + "/questions", "post", data)
}

export const detachQuestionsToQuestionnaires = (id, data) => {
    return callApi(api.questionnaires.index + "/" + id + "/questions", "delete", data)
}

export const getQuestions = () => {
    return callApi(api.questions.index)
}

export const addQuestions = (data) => {
    return callApi(api.questions.index, "post", data)
}

export const updateQuestions = (id, data) => {
    return callApi(api.questions.index + "/" + id, "post", {_method:"patch", ...data})
}

export const deleteQuestions = (id) => {
    return callApi(api.questions.index + "/" + id, "delete")
}

export const addChoices = (data) => {
    return callApi(api.choices.index, "post", data)
}

export const updateChoices = (id, data) => {
    return callApi(api.choices.index + "/" + id, "post", {_method:"patch", ...data})
}

export const deleteChoices = (id) => {
    return callApi(api.choices.index + "/" + id, "delete")
}

export const getGroups = () => {
    return callApi(api.groups.index)
}

export const addGroups = (data) => {
    return callApi(api.groups.index, "post", data)
}

export const updateGroups = (id, data) => {
    return callApi(api.groups.index + "/" + id, "post", {_method:"patch", ...data})
}

export const deleteGroups = (id) => {
    return callApi(api.groups.index + "/" + id, "delete")
}

const callApi = (endpoint, method="get", data=null) => {
    return Axios({
        url: endpoint,
        method: method,
        data: data
    }).then(res => res.data)
    .catch(e => console.log(e))
}

export default api