import { API } from "../middleware/api.actions"
import endpoints from "../../../api/endpoints"
import { formatResults } from "../helpers"

const resource = "QUESTIONS"
export const  QUESTIONS_FETCH = `${resource}_FETCH`
export const  QUESTIONS_SAVE = `${resource}_SAVE`

export const questionsFetch = (id) => ({
    type: API,
    payload: {
        url: endpoints.questions.index.url,
        method: endpoints.questions.index.method,
        data: {
            questionnaire_id: id
        },
        transformResponse: formatResults,
        onSuccess: QUESTIONS_SAVE,
        label: QUESTIONS_FETCH,
    }
})