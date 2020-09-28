const component = "COVID_CONTACTLESS_TEST"

export const COVID_CONTACTLESS_TEST_NEXT_PAGE = `${component}_NEXT_PAGE`
export const COVID_CONTACTLESS_TEST_PREV_PAGE = `${component}_PREV_PAGE`

export const covidContactlessTestNextPage = () => ({
    type: COVID_CONTACTLESS_TEST_NEXT_PAGE
})

export const covidContactlessTestPrevPage = () => ({
    type: COVID_CONTACTLESS_TEST_PREV_PAGE
})