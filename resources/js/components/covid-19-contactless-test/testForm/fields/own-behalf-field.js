import React from 'react'
import { renderField } from '../../../../redux-form/render-fields'
import { Field } from 'redux-form'

export const OwnBehalfField = () => {
    return (
        <div className="form-group">
            <label>Are you answering COVID-Questionnaire on your own behalf ?</label>
            <div><Field type="radio" name="own_behalf" value="yes" component={renderField} /> Yes</div>
            <div><Field type="radio" name="own_behalf"  value="no" component={renderField} /> No</div>
        </div>
    )
}