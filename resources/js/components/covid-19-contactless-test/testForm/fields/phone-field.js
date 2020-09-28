import React from 'react'
import { Field } from 'redux-form'
import { renderField } from '../../../../redux-form/render-fields'

export const PhoneFied = () => {
    return <Field type="text" name="phone" label="Phone" placeholder="xxx-xxx-xxx" component={renderField} />
}
