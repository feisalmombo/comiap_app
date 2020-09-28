import React from 'react'
import { Field } from 'redux-form'
import { renderField } from '../../../../redux-form/render-fields'

export const RelationshipField = () => {
    return (
        <div className="form-group">
            <label>Please state your relationship with the person</label>
            <div><Field type="radio" name="relationship" value="children" component={renderField}/> Children </div>
            <div><Field type="radio" name="relationship" value="parent" component={renderField}/> Parent </div>
            <div><Field type="radio" name="relationship" value="patient" component={renderField}/> Patient </div>
            <div><Field type="radio" name="relationship" value="client" component={renderField}/> Client </div>
            <div><Field type="radio" name="relationship" value="friend" component={renderField}/> Friend </div>
            <div><Field type="radio" name="relationship" value="neighbor" component={renderField}/> Neighbor </div>
            <div><Field type="radio" name="relationship" value="others" component={renderField}/> Others </div>
        </div>
    )
}