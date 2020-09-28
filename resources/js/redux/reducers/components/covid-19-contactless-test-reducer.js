import { COVID_CONTACTLESS_TEST_NEXT_PAGE, COVID_CONTACTLESS_TEST_PREV_PAGE } from "../../actions/components/covid-19-contactless-test-actions"

const obj = {
    questionnaire_id: 1,
    page: 1,
}

const covid19ContactlessTestReducer = (state=obj, action) => {
    switch (action.type) {
        case COVID_CONTACTLESS_TEST_NEXT_PAGE:
            return {...state, page: state.page + 1}
        case COVID_CONTACTLESS_TEST_PREV_PAGE:
            return {...state, page: state.page - 1}
    }
    return state
}

export default covid19ContactlessTestReducer