import React from 'react'
import { reduxForm } from 'redux-form'
import { OwnBehalfField } from '../fields/own-behalf-field'
import validate from '../validate'

var FirstWizard = ({ handleSubmit }) => {
    return (
        <form onSubmit={ handleSubmit }>
            <OwnBehalfField />
            <div className="d-flex">
            <button type="submit" className="btn btn-success ml-auto">Next</button>
            </div>
        </form>
    )
}

FirstWizard = reduxForm({
    form: 'contactless-test', // <------ same form name
    destroyOnUnmount: false, // <------ preserve form data
    forceUnregisterOnUnmount: true, // <------ unregister fields on unmount
    validate: validate,
})(FirstWizard)

export default FirstWizard