import { API_START, API_FINISH, API_ERROR } from "../../actions/middleware/api.actions"
import { SITES_SAVE, SITES_SEARCH } from "../../actions/data/sites-actions"

const obj = {
    isLoading: false,
    data: [],
    ref: {},
}

const sitesReducer = (state=obj, action) => {
    switch (action.type) {
        case `${API_START}_${SITES_SEARCH}`:
            return {...state, isLoading: true}
        case `${API_FINISH}_${SITES_SEARCH}`:
            return {...state, isLoading: false}
        case `${API_ERROR}_${SITES_SEARCH}`:
            return {...state, isLoading: false}
        case SITES_SAVE:
            return {...state, data: action.payload.data, ref: action.payload.ref}
    }
    return state
}

export default sitesReducer