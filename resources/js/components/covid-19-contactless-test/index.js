import React, { useEffect } from 'react'
import { questionsFetch } from '../../redux/actions/data/questions-actions'
import { connect } from 'react-redux'
import TestForm from './testForm'
import AnswersForm from './answersForm'



var Covid19ContactlessTest = ({ app, questions, questionsFetch, increment, decrement }) => {
    
    useEffect(() => {
        if (!questions.data && !questions.isLoading) {
            questionsFetch()
        }
    })

    return (
        <React.Fragment>
            <h3>My Covid Questionniare</h3>
            <TestForm />
            <div className="pt-2">
                <AnswersForm />
            </div>
        </React.Fragment>
    )
}

const mapStateToProps = (state) => ({
    questions: state.questions,
    app: state.covid19ContactlessTest
})

const mapDispatchToProps = (dispatch) => ({
    questionsFetch: () => dispatch(questionsFetch()),
})

Covid19ContactlessTest = connect(mapStateToProps, mapDispatchToProps)(Covid19ContactlessTest)

export default Covid19ContactlessTest