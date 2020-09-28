import React from 'react'
import { renderField } from '../../../../redux-form/render-fields'
import { Field } from 'redux-form'

export const EthnicityField = () => {
    return (
        <div className="form-group">
            <label>Enter you Ethnicity Group</label>
                <div><Field  type="radio" name="ethnicity" value="black" component={renderField} /> Black (Black American and African Origin) </div>
                <div><Field  type="radio" name="ethnicity" value="caucasian" component={renderField} /> Caucasian</div>
                <div><Field  type="radio" name="ethnicity" value="hispanic" component={renderField} /> Hispanic</div>
                <div><Field  type="radio" name="ethnicity" value="asian" component={renderField} /> Asian</div>
                <div><Field  type="radio" name="ethnicity" value="others" component={renderField} /> Others</div>
        </div>
    )
}
