import React from 'react'
import { renderField } from '../../../../redux-form/render-fields'
import { Field } from 'redux-form'

export const EmailField = () => {
    return <Field type="email" name="email" label="Email Address" placeholder="email@example.com" component={renderField }/>
}
