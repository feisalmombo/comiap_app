import React from 'react'
import { Field } from 'redux-form'
import { renderField } from '../../../../redux-form/render-fields'

export const FullnameField = () => {
    return <Field type="text" name="fullname" label="Enter your Full Name" placeholder="Lastname, Firstname M" component={renderField} />
}