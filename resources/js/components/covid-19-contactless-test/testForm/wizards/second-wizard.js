import React from 'react'
import { reduxForm } from 'redux-form'
import validate from '../validate'
import { FullnameField } from '../fields/fullname-field'
import { EmailField } from '../fields/email-field'
import { PhoneFied } from '../fields/phone-field'
import { EthnicityField } from '../fields/ethnicity-field'

var SecondWizard = ({ handleSubmit, prevPage }) => {
    return (
        <form onSubmit={handleSubmit}>
            <h4>Please tell us more about the identity of the person you are assisting with COVID-Questionnaire</h4>
            <FullnameField />
            <EmailField />
            <PhoneFied />
            <EthnicityField />
            <div className="d-flex">
                <button type="submit" className="btn btn-warning " onClick={() => prevPage()}>Prev</button>
                <button type="submit" className="btn btn-success ml-auto">Next</button>
            </div>
        </form>
    )
}

SecondWizard = reduxForm({
    form: 'contactless-test', // <------ same form name
    destroyOnUnmount: false, // <------ preserve form data
    forceUnregisterOnUnmount: true, // <------ unregister fields on unmount
    validate: validate,
})(SecondWizard)

export default SecondWizard