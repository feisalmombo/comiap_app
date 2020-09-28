import React from 'react'
import FirstWizard from './wizards/first-wizard'
import SecondWizard from './wizards/second-wizard'
import ThirdWizard from './wizards/third-wizard'
import { connect } from 'react-redux'
import { formValueSelector } from 'redux-form'
import { covidContactlessTestNextPage, covidContactlessTestPrevPage } from '../../../redux/actions/components/covid-19-contactless-test-actions'

var TestForm = ({ app: { page }, own_behalf, next, prev, onSubmit }) => {

    const nextPage = () => {
        if (own_behalf == "no") {
            next()
        }
    }

    const prevPage = () => prev()
    return (
        <div className="card text-dark">
            <div className="card-body">
                <h3 className="card-title">Covid 19 Contactless Test</h3>
                { page == 1 && <FirstWizard  onSubmit={() => nextPage()} />}
                { page == 2 && <SecondWizard onSubmit={ nextPage } prevPage={ prevPage } />}
                { page == 3 && <ThirdWizard onSubmit={ onSubmit } prevPage={ prevPage } />}
            </div>
        </div>
    )
}

export const selector = formValueSelector("contactless-test")

const mapStateToProps = (state) => ({
    app: state.covid19ContactlessTest,
    own_behalf: selector(state, "own_behalf")
})

const mapDispatchToProps = (dispatch) => ({
    next: () => dispatch(covidContactlessTestNextPage()),
    prev: () => dispatch(covidContactlessTestPrevPage())
})

TestForm = connect(mapStateToProps, mapDispatchToProps)(TestForm)

export default TestForm