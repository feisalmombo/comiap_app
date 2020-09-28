import React from 'react'
import { connect } from 'react-redux'
import { formValueSelector } from 'redux-form'

var AnswersForm = ({ questions, onSubmit }) => {

    return (
        <div className="card text-dark">
            <div className="card-body">
                <h3 className="card-title">Answer the Bellow Questions</h3>
                {questions.data.map(qn => <p>{qn.id}</p>)}
            </div>
        </div>
    )
}

export const selector = formValueSelector("contactless-test")

const mapStateToProps = (state) => ({
    questions: state.questions
})

const mapDispatchToProps = (dispatch) => ({

})

AnswersForm = connect(mapStateToProps, mapDispatchToProps)(AnswersForm)

export default AnswersForm