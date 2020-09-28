import React from 'react'

export const renderField = ({
    input,
    label,
    type,
    placeholder, 
    className,
    meta: { touched, error, warning }
}) => {
    if (!["radio","checkbox"].includes(type)) {
        return (
            <div className="form-group">
                <label>{label}</label>
                <input type={type} {...input} placeholder={placeholder ?? label} type={type}  className={`${className} form-control ${(touched && (error && "is-invalid"))}`} />
                {touched && (error && <span className="invalid-feedback" role="alert">{error}</span>)}
            </div>
        )
    } else {
        return <input type={type} {...input}  className={className} />
    }
}

export const renderError = ({ meta: { touched, error } }) =>
    touched && (error && <span className="invalid-feedback" role="alert">{error}</span>)