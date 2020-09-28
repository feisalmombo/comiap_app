import React from 'react'
import { reduxForm } from 'redux-form'
import { OwnBehalfField } from '../fields/own-behalf-field'
import validate from '../validate'
import { RelationshipField } from '../fields/relationship-field'

var ThirdWizard = ({ handleSubmit, prevPage }) => {
    return (
        <form onSubmit={ handleSubmit }>
            <RelationshipField />
            <div className="d-flex">
            <button type="submit" className="btn btn-warning " onClick={() => prevPage()}>Prev</button>
            <button type="submit" className="btn btn-success ml-auto">Submit</button>
            </div>
        </form>
    )
}

ThirdWizard = reduxForm({
    form: 'contactless-test', // <------ same form name
    destroyOnUnmount: false, // <------ preserve form data
    forceUnregisterOnUnmount: true, // <------ unregister fields on unmount
    validate: validate,
})(ThirdWizard)

export default ThirdWizard