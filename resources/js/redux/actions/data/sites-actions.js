import { API } from "../middleware/api.actions"
import { formatResults } from "../helpers"
import endpoints, { sites_api } from "../../../api/endpoints"

const resource = "SITES"
export const  SITES_SEARCH = `${resource}_SEARCH`
export const  SITES_SAVE = `${resource}_SAVE`

export const sitesSearch = (zipcode) => ({
    type: API,
    payload: {
        url: sites_api.search.url,
        method: sites_api.search.method,
        data: {
            zipcode: zipcode
        },
        transformResponse: x,
        onSuccess: SITES_SAVE,
        label: SITES_SEARCH,
    }
})

const x = (res) => {
    return res
}